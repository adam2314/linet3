<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class FormExtmatch extends CFormModel {

    public $account_id = 0;
    //public $refnum=0;
    public $currency_id = '';
    public $date;
    public $ext_total = 0;
    public $int_total = 0;
    public $Bankbooks = array();
    public $Transactions = array();

    public function beforeSave() {
        $this->date = date("Y-m-d H:m:s", CDateTimeParser::parse($this->date, Yii::app()->locale->getDateFormat('yiishort')));

        //return true;
        return parent::beforeSave();
    }

    public function afterSave() {
        $this->date = date(Yii::app()->locale->getDateFormat('phpshort'), strtotime($this->date));

        return parent::afterSave();
    }

    public function attributeLabels() {
        return array(
            'account_id' => Yii::t('labels', 'Account'),
            'currency_id' => Yii::t('labels', 'Currency'),
            'date' => Yii::t('labels', 'Date'),
            //'sum' => Yii::t('labels', 'Sum'),
            //'refnum' => Yii::t('labels', 'Refnum'),
            'ext_total' => Yii::t('labels', 'External Total'),
            'int_total' => Yii::t('labels', 'Internal Total'),
        );
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('account_id, ext_total, int_total', 'required'),
            array('account_id, currency_id, date, ext_total, int_total, Bankbooks, Transactions', 'safe'),
            array('ext_total', 'compare', 'compareAttribute'=>'int_total'),
        );
    }

    public function save() {
       
        //create Match
        $match = new ExtCorrelation();
        $match->account_id = $this->account_id;
        $match->owner = Yii::app()->user->id;
        $match->save();
        //bankbooks
        //print_r($this->Bankbooks);
        //print_r($this->Transactions);
        foreach ($this->Bankbooks['match'] as $bankbook=>$true) {
            Yii::log("bank:".$bankbook,'info','app');
            $bankbook = Bankbook::model()->findByPk($bankbook);
            if ($bankbook !== null) {
                $bankbook->extCorrelation = $match->id;
                $bankbook->save();
            }
        }
        //transaction
        foreach ($this->Transactions['match'] as $transaction=>$true) {
            Yii::log("trans:".$transaction,'info','app');
            $transaction = Transactions::model()->findByPk($transaction);
            if ($transaction !== null) {
                $transaction->extCorrelation = $match->id;
                $transaction->save();
            }
        }



        return $match->id;
    }

}
