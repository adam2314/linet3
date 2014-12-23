<?php

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

class Bank {

    //refnum; 
    //'creditcompany'); 
    //'cheque_num'); 
    //'bank'); 
    //'branch'); 
    //'cheque_acct'); 
    // 'cheque_date'); 
    // 'bank_refnum'); 
    // 'dep_date'); 
    //line,doc_id,name,value
    public function line($attrs = array()) {
        //print

        $text = "";
        foreach ($attrs as $attr) {
            $text.=Yii::t("app", $attr->attribute) . ":" . $attr->value . ", ";
        }
        return $text;
    }

    public function field() {
        //text,date,temp(nosave)
        return array(
            'refnum' => "string",
            'account_id' => "listT(Accounts[7])", //list by type 7-bank
            'bank' => "string",
            'branch' => "string",
            'bank_acc' => 'string',
            'due_date' => 'date');
    }

    public function transaction($in,$out, $model) {
        $due_date = DocchequesEav::model()->findByPk(array("doc_id" => $model->doc_id, "line" => $model->line,'attribute'=>'due_date'));
        $account_id = DocchequesEav::model()->findByPk(array("doc_id" => $model->doc_id, "line" => $model->line, 'attribute' => 'account_id'));
        if($due_date==NULL)
            throw new Exception("NO due date was found for transaction", 401);
        
        if ($account_id == NULL)
            throw new Exception("NO out account was found for transaction", 401);
        
        $valuedate = date("Y-m-d H:m:s", CDateTimeParser::parse($due_date->value, Yii::app()->locale->getDateFormat('yiishort')));

        $in->valuedate = $valuedate;
        $out->valuedate = $valuedate;
        
        $out->account_id = $account_id->value;
    }

    public function settings() {
        return array();
    }
    
    public function stoppage() {//needs to have!
        return false;
    }

}
