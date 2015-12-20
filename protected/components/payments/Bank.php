<?php

/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\components\payments;
use app\models\DocchequesEav;
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
            $text.=\Yii::t("app", $attr->attribute) . ":" . $attr->value . ", ";
        }
        return $text;
    }

    public function field() {
        //text,date,temp(nosave)
        return array(
            'refnum' => "string",
            'account_id' => "listT(app\models\Accounts[7])", //list by type 7-bank
            'bank' => "string",
            'branch' => "string",
            'bank_acc' => 'string',
            'due_date' => 'date');
    }

    public function transaction($in,$out, $model) {
        $due_date = DocchequesEav::findOne(array("doc_id" => $model->doc_id, "line" => $model->line,'attribute'=>'due_date'));
        $account_id = DocchequesEav::findOne(array("doc_id" => $model->doc_id, "line" => $model->line, 'attribute' => 'account_id'));
        if($due_date==NULL)
            throw new Exception("NO due date was found for transaction", 401);
        
        if ($account_id == NULL)
            throw new Exception("NO out account was found for transaction", 401);
        
        $valuedate = $due_date->value;

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
