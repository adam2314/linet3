<?php

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

    public $iTotalVat;

    /*
     * for open format export 
     */

    public function CalcPriceTotalWithVat() {
        /*
          calc = typeof calc !== 'undefined' ? calc : true;
          var iVatRate = Number($('#Docdetails_' + index + '_iVatRate').val());
          var iTotalVat = Number($('#Docdetails_' + index + '_iTotalVat').val());
          if (calc) {
          ihTotal = $('#Docdetails_' + index + '_ihTotal').val();
          }

          ihTotal = iTotalVat - (iTotalVat * (iVatRate / 100)) / (1 + (iVatRate / 100));

          $('#Docdetails_' + index + '_ihTotal').val(ihTotal.toFixed(2));
          //$('#Docdetails_' + index + '_iTotal').val(ihTotal.toFixed(2));
          $('#Docdetails_' + index + '_iTotallabel').html(ihTotal.toFixed(2));
          $('#Docdetails_' + index + '_iTotal').val(ihTotal.toFixed(2));
          //totalChange(index);

          return totalChange(index);
         */
        

          $iVatRate = 0;
          $iTotalVat =0;
          

          $this->ihTotal = $this->iTotalVat - ($this->iTotalVat * ($iVatRate / 100)) / (1 + ($iVatRate / 100));

         

          return $this->CalcPrice();
    }

    public function CalcPriceTotal() {
        
    }

    public function CalcPrice() {
          $this->iTotal = ($this->iItem * $this->qty)* ($rate / $doc_rate);//qty
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
            array('description', 'safe'),
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
