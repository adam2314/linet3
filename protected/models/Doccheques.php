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
 * This is the model class for table "cheques".
 *
 * The followings are the available columns in table 'cheques':
 * @property string $prefix
 * @property string $refnum
 * @property integer $type
 * @property integer $creditcompany
 * @property string $cheque_num
 * @property string $bank
 * @property string $branch
 * @property string $cheque_acct
 * @property string $cheque_date
 * @property string $sum
 * @property string $bank_refnum
 * @property string $dep_date
 * @property integer $id
 */

namespace app\models;

use Yii;
use app\components\basicRecord;
class Doccheques extends basicRecord {

    const table = '{{%docCheques}}';

    //private $dateDBformat = true;

    /*
     * for open format export 
     */

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
        $rcps = '';

        //get all fields (D110) sort by id
        $fields = OpenFormat::find()->where(['type_id' => "D120"])->All();
        //loop strfgy
        foreach ($fields as $field) {
            $rcps.=$this->openfrmtFieldStr($field, $line);
        }
        return $rcps . "\r\n";
    }

    public function transaction($transaction, $action, $account_id) {
        $model = PaymentType::findOne($this->type);
        $paymenet = new $model->value;

        $in = new Transactions();
        $in->num = $transaction->num;
        $in->account_id = $account_id;
        $in->type = $transaction->type;
        $in->refnum1 = $transaction->refnum1;
        $in->valuedate = $transaction->valuedate;
        $in->details = $transaction->details;

        $in->currency_id = $this->currency_id;
        $in->sum = $this->sum * $action;
        $in->owner_id = $transaction->owner_id;
        $in->linenum = $transaction->linenum;

        $transaction->linenum++;

        $out = new Transactions();

        //if($this->Type->oppt_account_id!=0)
        $out->account_id = $this->typeo->oppt_account_id;
        $out->type = $transaction->type;
        $out->refnum1 = $transaction->refnum1;
        $out->valuedate = $transaction->valuedate;
        $out->details = $transaction->details;

        $out->currency_id = $this->currency_id;
        $out->sum = $this->sum * $action * -1;
        $out->owner_id = $transaction->owner_id;
        $out->linenum = $transaction->linenum;

        $transaction->linenum++;



        if (method_exists($paymenet, "transaction")) {
            $paymenet->transaction($in, $out, $this);
        } else {
            
        }

        $transaction->num = $in->save();//in the case of recipet we did have a problem:/
        $out->num = $transaction->num ;
        $out->save();
        
        return $transaction;
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Cheques the static model class
     */
    public static function primaryKey() {
        return array('doc_id', 'line');
    }

//*/

   
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
        return array(
            [['type', 'currency_id', 'sum','doc_id' , 'line'], 'required'],
            array(['type', 'doc_id', 'line'], 'number', 'min' => 0),
            array(['sum'], 'number'),
            
            //[['type'],'typeVal'],
            //array('doc_id', 'string', 'max' => 10),
            array(['currency_id'], 'string', 'max' => 3),
            //array('cheque_acct, cheque_num, bank_refnum', 'string', 'max' => 20),
            //array(['sum'], 'string', 'max' => 8),
            array(['currency_id'], 'safe'),
            array(['currency_id', 'doc_id', 'type', 'sum', 'line', 'bank_refnum'], 'safe', 'on' => 'search'),
        );
    }

    public function typeVal($attribute, $params){
        $item=PaymentType::findOne(["id"=>$this->$attribute]);
        
        if ($item===null) {
            $this->addError($attribute, Yii::t('app', 'Type not found'));
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
            'Type' => array(self::BELONGS_TO, 'PaymentType', 'type'),
        );
    }
    public function getTypeo() {
        return $this->hasOne(PaymentType::className(), array('id' => 'type'));
    }

    public function getDoc() {
        return $this->hasOne(docs::className(), array('id' => 'doc_id'));
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'doc_id' => Yii::t('app', 'Refnum'),
            'type' => Yii::t('app', 'Type'),
            'sum' => Yii::t('app', 'Sum'),
            'currency_id' => Yii::t('app', 'Currency'),
            'line' => Yii::t('app', 'Line'),
        );
    }

    public function printDetails() {
        $model = PaymentType::findOne($this->type);
        $form = new $model->value;

        $attrs = DocchequesEav::find()->where(["doc_id" => $this->doc_id, "line" => $this->line])->All();
        //$text='';

        return $form->line($attrs);
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {

        $criteria = new CDbCriteria;

        $criteria->compare('doc_id', $this->doc_id, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('line', $this->line);
        $criteria->compare('currency_id', $this->currency_id, true);

        if ($this->bank_refnum == '') {
            $criteria->addCondition('bank_refnum IS NULL');
            $criteria->addCondition('bank_refnum =""', 'OR');
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 50),
        ));
    }

    public function depositSearch() {
        $query = Doccheques::find();

          $query->where('bank_refnum is null AND (type=1 OR type=2)');

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        
        
        
        
        return $dataProvider;
        
        $criteria = new CDbCriteria;


        $criteria->addCondition('bank_refnum IS NULL');
        $criteria->addCondition('(type = 1 OR type = 2)', 'AND');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 50),
        ));
    }

}
