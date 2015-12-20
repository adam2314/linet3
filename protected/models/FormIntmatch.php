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

class FormIntmatch extends Model {

    //put your code here
    public $account_id;
    //public $date;
    public $in_total = 0;
    public $out_total = 0;
    public $in = array();
    public $out = array();

    public function attributeLabels() {
        return array(
            'account_id' => Yii::t('app', 'Account'),
           
            'in_total' => Yii::t('app', 'Credit Total'),
            'out_total' => Yii::t('app', 'Debit Total'),
        );
    }

    public function save() {

        //create Match
        $match = new IntCorrelation();
        $match->account_id = $this->account_id;
        $match->owner = Yii::$app->user->id;
        $match->save();
        //bankbooks
        foreach ($this->in as $transaction => $true) {
            $transaction = Transactions::findOne($transaction);
            if ($transaction !== null) {
                $transaction->intCorrelation = $match->id;
                $transaction->intType = true;
                $transaction->save();
            }
        }
        //transaction
        foreach ($this->out as $transaction => $true) {
            $transaction = Transactions::findOne($transaction);
            if ($transaction !== null) {
                $transaction->intCorrelation = $match->id;
                $transaction->intType = false;
                $transaction->save();
            }
        }



        return $match->id;
    }

}
