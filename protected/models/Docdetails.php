<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
/**
 * This is the model class for table "docDetails".
 *
 * The followings are the available columns in table 'docDetails':
 * @property string $doc_id
 * @property string $item_id
 * @property string $name
 * @property string $description
 * @property string $qty
 * @property string $unit_price
 * @property string $currency_id
 * @property string $price
 * @property string $invprice
 * @property integer $line
 */
class Docdetails extends basicRecord {

    const table = '{{docDetails}}';

    private $ini = false;
    public $iTotalVat = null;
    public $iTotallabel = null;
    public $rate = 1;
    public $doc_rate = 1;

    /*
     * for open format export 
     */

    public function save($runValidation = true, $attributes = NULL) {
        //var_dump($this->iTotalVat);
        //exit;
        if ($this->iItem == null) {
            if ($this->iTotalVat !== null)
                $this->CalcPriceWithVat(); //qty,rate,totalwVat
            else if ($this->iTotal !== null)
                $this->CalcPriceWithOutVat(); //qty,rate,totalw/oVat
        }else {
            $this->CalcPrice();
        }

        return parent::save($runValidation, $attributes);
    }

    private function ini() {
        if (!$this->ini) {
            $this->iVatRate = Item::model()->findByPK($this->item_id)->vat;
            $this->rate = Currates::model()->GetRate($this->currency_id);

            if ($this->doc_rate == 0){
                $doc=Docs::model()->findByPk($this->doc_id);
                $this->doc_rate = Currates::model()->GetRate($doc->currency_id);
            }
            $this->ini!=$this->ini;
        }
    }

    public function CalcPriceWithVat() {
        $this->ini();

        $this->iTotal = round($this->iTotalVat - ($this->iTotalVat * ($this->iVatRate / 100)) / (1 + ($this->iVatRate / 100)), 2);

        return $this->CalcPriceWithOutVat();
    }

//itotal+vat
    public function CalcPriceWithOutVat() {
        $this->ini();

        $this->iItem = round(($this->iTotal / $this->qty) * ($this->rate / $this->doc_rate), 2);

        return $this->CalcPrice();
    }

//qty,unit,rate,vat, item
    public function CalcPrice() {
        $this->ini();

        $this->ihItem = $this->iItem;



        $this->iTotal = round(($this->iItem * $this->qty) * ($this->rate / $this->doc_rate), 2);
        $this->iTotalVat = round(($this->iTotal * (($this->iVatRate / 100) + 1)), 2);


        $this->ihTotal = $this->iTotal;
        $this->iTotallabel = $this->iTotal;


        return $this;
    }

    public function getType() {
        return isset($this->Doc) ? $this->Doc->getType() : "";
    }

    public function getNum() {
        return isset($this->Doc) ? $this->Doc->docnum : "";
    }

    public function getDate() {
        return isset($this->Doc) ? $this->Doc->issue_date : "";
    }

    public function openfrmt($line) {
        $dets = '';

        //get all fields (D110) sort by id
        $criteria = new CDbCriteria;
        $criteria->condition = "type_id = :type_id";
        $criteria->params = array(':type_id' => "D110");
        $fields = OpenFormat::model()->findAll($criteria);

        //loop strfgy
        foreach ($fields as $field) {
            $dets.=$this->openfrmtFieldStr($field, $line);
        }
        return $dets . "\r\n";
    }

    public function transaction($num, $refnum, $valuedate, $details, $action, $line, $optacc, $tranType) {


        if (is_null($this->Item)) {
            throw new CHttpException(500, 'The item ' . $this->item_id . ' does not exsits.');
        }
        $vatcat = $this->Item->itemVatCat_id;
        $vatCatAcc = UserIncomeMap::model()->findByPk(array('user_id' => Yii::app()->user->id, 'itemVatCat_id' => $vatcat));
        if ($vatCatAcc === null)
            throw new CHttpException(500, 'The item ' . $this->item_id . ' does not have a vat catagory.');




        $income = new Transactions();

        if (is_null($optacc)) {

            $incomeacc = $vatCatAcc->account_id;

            $income->sum = ($this->ihTotal * $action);
        } else {
            $incomeacc = $optacc;



            if ($oppt = Accounts::model()->findByPk($vatCatAcc->account_id))
                $multi = ($oppt->src_tax / 100);

            $vat = $this->ihTotal * $multi;

            if ($oppt = Accounts::model()->findByPk($incomeacc))
                $multi = 1 - ($oppt->src_tax / 100);
            $vat = $vat * $multi;


            //$multi=$this->iTotalVat*$multi;
            Yii::log($this, CLogger::LEVEL_INFO, __METHOD__);
            Yii::log($multi, CLogger::LEVEL_INFO, __METHOD__);
            $income->sum = (($this->ihTotal + $vat) * $action);
        }


        $income->num = $num;
        $income->account_id = $incomeacc;
        $income->type = $tranType;
        $income->refnum1 = $refnum;
        $income->valuedate = $valuedate;

        $income->details = $details;
        $income->currency_id = $this->currency_id;

        $income->owner_id = Yii::app()->user->id;
        $income->linenum = $line;
        return $income->save();
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Docdetails the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function primaryKey() {
        return array('doc_id', 'line');
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, line', 'required'),
            array('line, unit_id', 'numerical', 'integerOnly' => true),
            array('doc_id, item_id, currency_id', 'length', 'max' => 10),
            array('name', 'length', 'max' => 255),
            array('ihTotal, ihItem, iItem, iTotal, iVatRate, qty', 'length', 'max' => 20),
            array('description, iTotalVat, doc_rate', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('doc_id, item_id, name, description, qty, unit_id, currency_id, ihTotal, ihItem, iItem, iTotal, iVatRate, line', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Doc' => array(self::BELONGS_TO, 'Docs', 'doc_id'),
            'ItemUnit' => array(self::BELONGS_TO, 'Itemunit', 'unit_id'),
            'Item' => array(self::BELONGS_TO, 'Item', 'item_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'doc_id' => Yii::t('labels', 'Doc'),
            'item_id' => Yii::t('labels', 'Item'),
            'name' => Yii::t('labels', 'Name'),
            'description' => Yii::t('labels', 'Description'),
            'qty' => Yii::t('labels', 'Qty'),
            'iItem' => Yii::t('labels', 'Unit Price'),
            'unit_id' => Yii::t('labels', 'Unit id'),
            'currency_id' => Yii::t('labels', 'Currency'),
            'iTotal' => Yii::t('labels', 'Price'),
            'ihItem' => Yii::t('labels', 'invoice Unit Price'),
            'ihTotal' => Yii::t('labels', 'invoice Price'),
            'line' => Yii::t('labels', 'Line'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('doc_id', $this->doc_id, true);
        $criteria->compare('item_id', $this->item_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('qty', $this->qty, true);
        $criteria->compare('unit_price', $this->unit_price, true);
        $criteria->compare('currency_id', $this->currency_id, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('invprice', $this->invprice, true);
        $criteria->compare('line', $this->line);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
