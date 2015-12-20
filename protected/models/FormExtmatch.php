<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\models;
use Yii;
use yii\base\Model;
class FormExtmatch extends Model {

    public $account_id = 0;
    //public $refnum=0;
    public $currency_id = '';
    public $date;
    public $ext_total = 0;
    public $int_total = 0;
    public $Bankbooks = array();
    public $Transactions = array();

    /*
    public function beforeSave() {
        //$this->date = date("Y-m-d H:m:s", CDateTimeParser::parse($this->date, Yii::$app->locale->getDateFormat('yiishort')));

        //return true;
        return parent::beforeSave();
    }

    public function afterSave() {
        //$this->date = date(Yii::$app->locale->getDateFormat('phpshort'), strtotime($this->date));

        return parent::afterSave();
    }
*/
    public function attributeLabels() {
        return array(
            'account_id' => Yii::t('app', 'Account'),
            'currency_id' => Yii::t('app', 'Currency'),
            'date' => Yii::t('app', 'Date'),
            //'sum' => Yii::t('app', 'Sum'),
            //'refnum' => Yii::t('app', 'Refnum'),
            'ext_total' => Yii::t('app', 'External Total'),
            'int_total' => Yii::t('app', 'Internal Total'),
        );
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['account_id', 'ext_total', 'int_total'], 'required'),
            array(['account_id', 'currency_id', 'date', 'ext_total', 'int_total', 'Bankbooks', 'Transactions'], 'safe'),
            array(['ext_total'], 'compare', 'compareAttribute'=>'int_total'),
        );
    }

    public function save() {
       
        //create Match
        $match = new ExtCorrelation();
        $match->account_id = $this->account_id;
        $match->owner = Yii::$app->user->id;
        $match->save();
        //bankbooks
        //print_r($this->Bankbooks);
        //print_r($this->Transactions);
        foreach ($this->Bankbooks['match'] as $bankbook=>$true) {
            Yii::info("bank:".$bankbook);
            $bankbook = Bankbook::findOne($bankbook);
            if ($bankbook !== null) {
                $bankbook->extCorrelation = $match->id;
                $bankbook->save();
            }
        }
        //transaction
        foreach ($this->Transactions['match'] as $transaction=>$true) {
            Yii::info("trans:".$transaction);
            $transaction = Transactions::findOne($transaction);
            if ($transaction !== null) {
                $transaction->extCorrelation = $match->id;
                $transaction->save();
            }
        }



        return $match->id;
    }

}
