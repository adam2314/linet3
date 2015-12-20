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
class PelaCredit {
    private $fields=array();//needs to have!
    
    private $url = 'https://ws101.pelecard.biz/webservices.asmx/';
    private $operation = 'DebitRegularType';

    const CUR_ILS = 1;
    const CUR_USD = 2;
    const CUR_EUR = 978;

    
    //refnum; 
            //'creditcompany'); 
            //'cheque_num'); 
            //'bank'); 
            //'branch'); 
            //'cheque_acct'); 
            // 'cheque_date'); 
            // 'bank_refnum'); 
            // 'dep_date');
    public function setFields($fields){
         $this->fields=$fields;
    }
    
    
    public function field(){
        //text,date,temp(nosave),list()
        return array(
            "card_no"=>'string',
            'pid'=>'string',//is
            //'full_card'=>'temp',//creditCard
            'valid_month'=>'select(["01","02","03","04","05","06","07","08","09","10","11","12"])',//mm
            'valid_year'=>'select(["14","15","16","17","18","19","20"])',//yy
            'cvv'=>'temp',//cvv2
            );
    }
    

    public function stoppage() {//needs to have!
        return true;
    }

    public function bill() {//needs to have!
        $params = array(
            'userName' => \Yii::app()->user->settings['pelecard.userName'],
            'password' => \Yii::app()->user->settings['pelecard.password'],
            'termNo' => \Yii::app()->user->settings['pelecard.termNo'],
            'shopNo' => \Yii::app()->user->settings['pelecard.shopNo'],
            'creditCard' => $this->fields["card_no"]["value"], //
            'creditCardDateMmyy' => $this->fields["valid_month"]["value"].$this->fields["valid_year"]["value"], //
            'token' => '', //
            'total' => $this->fields["sum"], //
            'currency' => '1',
            
            'cvv2' => $this->fields["cvv"]["value"], //
            'id' => $this->fields["pid"]["value"], //
            'authNum' => '', //
            'parmx' => 'test' //0## NO TRAILING COMMA
        );
        
        

        return $this->send($params);

    }

    
     public function settings(){
        
        return array(
            "pelecard.userName",
            'pelecard.password',
            "pelecard.termNo",
            'pelecard.shopNo',
        );
    }
        
    private function send($data) {
        
        $url = $this->url . $this->operation;

        $output = \Yii::app()->curl
                //->addAuth($this->authUser, $this->authPasswd)
                //->setOptions(array('Content-Type: application/xml'))
                ->post($url, http_build_query($data));

        $bill=(substr(trim(strip_tags($output)), 0, 3)=='000');
        return array("code"=>substr(trim(strip_tags($output)), 0, 3), "text"=>trim(strip_tags($output)),"bill"=>$bill);
        //return $output;
       
    }
    public function line($attrs=array()){
        return "";
        
    }
    
    

}
