<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
            $text.=Yii::t("app", $attr->attribute) . ":" . $attr->value . ", ";
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
            'cheque_date' => 'date');
    }

    public function transaction($in,$out, $model) {
        $due_date = DocchequesEav::model()->findByPk(array("doc_id" => $model->doc_id, "line" => $model->line,'attribute'=>'cheque_date'));
        if($due_date==NULL)
            throw new Exception("NO due date was found for transaction", 401);
        $valuedate = date("Y-m-d H:m:s", CDateTimeParser::parse($due_date->value, Yii::app()->locale->getDateFormat('yiishort')));
        
        $in->valuedate = $valuedate;
        $out->valuedate = $valuedate;
    }

    public function settings() {
        return array();
    }

    public function stoppage() {//needs to have!
        return false;
    }

}
