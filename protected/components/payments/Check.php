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
class Check {

    //refnum; 
    //'creditcompany'); 
    //'cheque_num'); 
    //'bank'); 
    //'branch'); 
    //'cheque_acct'); 
    // 'cheque_date'); 
    // 'bank_refnum'); 
    // 'dep_date'); 
    //line,doc_id,attribute,value
    public function line($attrs = array()) {
        $text = "";
        foreach ($attrs as $attr) {
            $text.=\Yii::t("app", $attr->attribute) . ":" . $attr->value . ", ";
        }

        return $text;
    }

    public function field() {
        //text,date,temp(nosave)
        return array(
            'cheque_num' => "string",
            'bank' => "string",
            'branch' => "string",
            'cheque_acct' => "string",
            'cheque_date' => ["type"=>'date',"value"=>  \app\models\Record::readDateFormat(time())],
        );
            
    }

    public function transaction($in,$out, $model) {
        $due_date = DocchequesEav::find()->where(array("doc_id" => $model->doc_id, "line" => $model->line,'attribute'=>'cheque_date'))->one();
        if ($due_date==NULL){
            $model->addError("cheque_date", \Yii::t('app', 'Not a valid doc cheque_date'));
            //throw new \Exception("NO due date was found for transaction", 401);
        }else {
                $valuedate = $due_date->value;
                $in->valuedate = $valuedate;
                $out->valuedate = $valuedate;
        }
        
        
        
    }

    public function settings() {
        return array();
    }

    public function stoppage() {//needs to have!
        return false;
    }

}
