<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class FormIntmatch extends CFormModel {

    //put your code here
    public $account_id;
    //public $date;
    public $in_total = 0;
    public $out_total = 0;
    public $in = array();
    public $out = array();

    public function attributeLabels() {
        return array(
            'account_id' => Yii::t('labels', 'Account'),
           
            'in_total' => Yii::t('labels', 'Credit Total'),
            'out_total' => Yii::t('labels', 'Debit Total'),
        );
    }

    public function save() {

        //create Match
        $match = new IntCorrelation();
        $match->account_id = $this->account_id;
        $match->owner = Yii::app()->user->id;
        $match->save();
        //bankbooks
        foreach ($this->in as $transaction => $true) {
            $transaction = Transactions::model()->findByPk($transaction);
            if ($transaction !== null) {
                $transaction->intCorrelation = $match->id;
                $transaction->intType = true;
                $transaction->save();
            }
        }
        //transaction
        foreach ($this->out as $transaction => $true) {
            $transaction = Transactions::model()->findByPk($transaction);
            if ($transaction !== null) {
                $transaction->intCorrelation = $match->id;
                $transaction->intType = false;
                $transaction->save();
            }
        }



        return $match->id;
    }

}
