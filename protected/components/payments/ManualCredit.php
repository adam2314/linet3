<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ManualCredit {

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
            'last_4_digits' => "string",
            'pid' => "string"
            );
    }

    public function settings() {
        
    }

    public function stoppage() {//needs to have!
        return false;
    }

}
