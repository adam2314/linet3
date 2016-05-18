<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
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

namespace app\models;

use Yii;
use app\components\basicRecord;
use app\models\Item;

class Docdetails extends basicRecord {

    const table = '{{%docDetails}}';

    public $initParam = false;
    public $updateItm=false;
    private $_precision;
    //public $iTotalVat = null;
    public $iTotallabel = null;

    public $valuedate;
    /*
     * for open format export 
     */
/*
    public function fields() {
        $fields = parent::fields();
        $fields['iTotallabe']=null;
        //print_r($fields);
        return $fields;
    }//*/

    public function save($runValidation = true, $attributes = NULL) {


        if ($this->iTotalVat !== null)
            $this->CalcPriceWithVat(); //qty,rate,totalwVat
        else if ($this->iTotal !== null)
            $this->CalcPriceWithOutVat(); //qty,rate,totalw/oVat
        else {
            $this->CalcPrice();
        }



        //adam this is not good for open format at all: 
        //$this->iVatRate = 0;
        return parent::save($runValidation, $attributes);
    }

    private function ini() {
        if ($this->valuedate == null) {
            $this->valuedate = Record::writeDate(time());
        }


        if (!$this->initParam) {
            $this->_precision = Yii::$app->params['precision'];

            $this->iVatRate = ItemVatCat::TaxRate($this->vat_cat_id, $this->valuedate);
            
            $this->initParam != $this->initParam;
        }
    }

    public function CalcPriceWithVat() {
        $this->ini();


        $this->iTotal = round(
                ($this->iTotalVat -
                ($this->iTotalVat * ($this->iVatRate / 100)) /
                (1 + ($this->iVatRate / 100))
                ), $this->_precision);



        if ($this->qty == 0) {
            return $this;
        }

        $this->iItem = $this->aValue(($this->iTotal / $this->qty), 1);
        $this->ihItem = $this->iItem;
        $this->ihTotal = $this->iTotal;
        $this->iTotallabel = $this->iTotal;

        return $this;
    }

//itotal+vat
    public function CalcPriceWithOutVat() {
        $this->ini();
        $this->iItem = $this->aValue(($this->iTotal / $this->qty), -1);

        return $this->CalcPrice();
    }

//qty,unit,rate,vat, item
    public function CalcPrice() {
        $this->ini();
        $this->ihItem = $this->iItem;
        $this->iTotal = $this->aValue(($this->iItem * $this->qty), -1);
        $this->iTotalVat = $this->totalVatCalc();
        $this->ihTotal = $this->iTotal;
        $this->iTotallabel = $this->iTotal;

        return $this;
    }

    private function totalVatCalc() {
        return round($this->iTotal + $this->vatCalc(), $this->_precision);
    }

    public function vatCalc() {
        return round(($this->iTotal * (($this->iVatRate / 100) )), $this->_precision);
    }

    /*
     * optacc=outcome acc(knownvat)
     */

    public function knownVatCalc($optacc) {
        $this->ini();
        $this->getItem();
        
        if (is_null($this->item)) {
            throw new \Exception('The item ' . $this->item_id . ' does not exsits.');
        }

        $knownVat = 0;
        
        if ($optacc == '') {
            $knownVat = ($this->vatCalc());
        } else {
            $this->account_id = $optacc;
            $multi = 1;
            if ($oppt = Accounts::findOne($this->account_id))//not null?
                $multi = ($oppt->src_tax / 100);
            
            $knownVat = round($this->vatCalc() * $multi, $this->_precision);
        }


        return $knownVat;
    }
    
    

    public function OpenfrmtType() {
        return isset($this->doc) ? $this->doc->OpenfrmtType() : "";
    }

    public function getNum() {
        return isset($this->doc) ? $this->doc->docnum : "";
    }

    public function getDate() {
        return isset($this->doc) ? $this->doc->issue_date : "";
    }

    public function openfrmt($line) {
        $dets = '';


        $fields = OpenFormat::find()->where(['type_id'=>"D110"])->All();

        //loop strfgy
        foreach ($fields as $field) {
            $dets.=$this->openfrmtFieldStr($field, $line);
        }
        return $dets . "\r\n";
    }

    private function aValue($sum, $bridge = -1) {

        if($this->currency_rate==0){
            return 0;
        }

        if ($this->currency_rate > 1) {
            $bridge*=-1;
        }


        if ($bridge != -1) {
            $sum = $this->cValue($sum);
        } else {
            $sum = $this->tValue($sum);
        }

        return round($sum, $this->_precision); //$sum;//
    }

    private function cValue($sum) {
        if ($this->currency_rate <= 1) {
            $sum = $sum / $this->currency_rate;
        } else {
            $sum = $sum * $this->currency_rate;
        }

        return $sum;
    }

    private function tValue($sum) {
        if ($this->currency_rate >= 1) {
            $sum = $sum / $this->currency_rate;
        } else {
            $sum = $sum * $this->currency_rate;
        }

        return $sum;
    }

    public function transaction($transaction, $action, $optacc) {
        $knownVat = $this->vatCalc() - ($this->knownVatCalc($optacc));
        $sum = $this->iTotal + $knownVat;


        if ($sum)
            return $transaction->addSingleLine($this->account_id, round($sum * $action, $this->_precision));


        return $transaction;
    }

    public static function primaryKey() {
        return ['doc_id', 'line'];
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            [['item_id', 'name', 'line', 'qty'], 'required'],
            
            array(['item_id','doc_id', 'line', 'unit_id'], 'number', 'integerOnly' => true),
            array(['currency_id'], 'string', 'max' => 3),
            array(['name'], 'string', 'max' => 255),
            array(['ihTotal', 'ihItem', 'iItem', 'iTotal', 'iVatRate', 'qty','currency_rate'], 'number'),
            array(['description', 'iTotalVat', 'valuedate'], 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['doc_id', 'item_id', 'name', 'description', 'qty', 'unit_id', 'currency_id', 'ihTotal', 'ihItem', 'iItem', 'iTotal', 'iVatRate', 'line'], 'safe', 'on' => 'search'),
        );
    }

    
    public function numVal($attribute, $params) {
        if ($this->$attribute==0||$this->$attribute==null||$this->$attribute=='') {
            $this->addError($attribute, $attribute." ".Yii::t('app', 'cant be zero or empty'));
        }
    }
    public function itemVal($attribute, $params) {
        $item=Item::findOne(["id"=>$this->$attribute]);
        
        if ($item===null) {
            $this->addError($attribute, Yii::t('app', 'Item id not found'));
        }
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
    public function getItem() {
        return $this->hasOne(Item::className(), array('id' => 'item_id'));
    }
    public function getDoc() {
        return $this->hasOne(Docs::className(), array('id' => 'doc_id'));
    }
    public function getItemUnit() {
        return $this->hasOne(Itemunit::className(), array('id' => 'unit_id'));
    }
    

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'doc_id' => Yii::t('app', 'Doc'),
            'item_id' => Yii::t('app', 'Item'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'qty' => Yii::t('app', 'Qty'),
            'iItem' => Yii::t('app', 'Unit Price'),
            'unit_id' => Yii::t('app', 'Unit id'),
            'currency_id' => Yii::t('app', 'Currency'),
            'iTotal' => Yii::t('app', 'Price'),
            'ihItem' => Yii::t('app', 'invoice Unit Price'),
            'ihTotal' => Yii::t('app', 'invoice Price'),
            'line' => Yii::t('app', 'Line'),
            'iTotalVat' => Yii::t('app', 'iTotalVat'),
        );
    }


}
