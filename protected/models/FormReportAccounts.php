<?php

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class FormReportAccounts extends CFormModel {

    public $type;
    public $acc = "";
    public $from_date;
    public $to_date;

    
    public function attributeLabels() {
        return array(
            'from_date' => Yii::t('labels', 'From Date'),
            'to_date' => Yii::t('labels', 'To Date'),
            'acc' => Yii::t('labels', 'Account IDs'),
            'type' => Yii::t('labels', 'Account Type'),
            
        );
    }
    
    
    public function init() {
        $yiidatetimesec = Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpshort = Yii::app()->locale->getDateFormat('phpshort');

        $this->from_date = date($phpshort, CDateTimeParser::parse('01/01/' . date('Y') . ' 00:00:00', $yiidatetimesec));
        $this->to_date = date($phpshort);
        return parent::init();
    }

    public function accounts() {
        if (substr_count($this->acc, ",") != 0) {
            $accs = explode(",", $this->acc);
            $accounts = array();
            foreach ($accs as $acc) {
                $accounts = array_merge($accounts, $this->between($acc));
            }
            return $accounts;
        }

        return $this->between($this->acc);
    }

    private function between($str) {

        if (substr_count($str, "-") == 1) {
            $accs = explode("-", $str);
            $accounts = array();
            for ($index = $accs[0]; $index <= $accs[1]; $index++) {
                $acc = $this->chkType($index);
                if ($acc !== null)//if account exstis and in type add
                    $accounts[] = $acc;
            }
            return $accounts;
        } else {
            return array($this->chkType($str));
        }
    }

    private function chkType($account_id) {
        $model = Accounts::model()->findByPk($account_id);
        if ($model === NULL)
            return NULL;
        if ($model->type == $this->type)
            return $account_id;
        elseif ($this->type == '')
            return $account_id;
        else
            return null;
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('acc', 'required'),
            array('to_date, from_date, type, acc', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('to_date, from_date, acc, type', 'safe', 'on' => 'search'),
        );
    }

    public function search($id) {
        //echo $id . uniqid();


        $transactions = new Transactions('search');
        $transactions->unsetAttributes();
        $transactions->account_id = $id;
        $transactions->from_date = $this->from_date;
        $transactions->to_date = $this->to_date;
        return $transactions->search();
    }

    //put your code here
}
