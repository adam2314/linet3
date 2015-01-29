<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class PelaCreditPaymnts {
    private $fields=array();//needs to have!
    
    private $url = 'https://ws101.pelecard.biz/webservices.asmx/';
    private $operation = 'DebitRegularType';

    const CUR_ILS = 1;
    const CUR_USD = 2;
    const CUR_EUR = 978;

    public function line($attrs=array()){
        return "";
        
    }
        
    
    
    public function field(){
        //text,date,temp(nosave),list()
        return array(
            "card_no"=>'string',
            'pid'=>'string',//is
            'full_card'=>'temp',//creditCard
            'valid_month'=>'select([01,02,03,04,05,06,07,08,09,10,11,12])',//mm
            'valid_year'=>'select([14,15,16,17,18,19,20])',//yy
            'cvv'=>'temp',//cvv2
            'firstPymnt'=>'string',
            'paymentsNo'=>'string',
            //total=sum
            );
    }
    
    public function settings(){
        
        return array(
            "pelecard.userName",
            'pelecard.password',
            "pelecard.termNo",
            'pelecard.shopNo',
        );
    }

    public function stoppage() {//needs to have!
        return true;
    }

    public function bill() {//needs to have!



        $params = array(
            'userName' => Yii::app()->user->settings['pelecard.userName'],
            'password' => Yii::app()->user->settings['pelecard.password'],
            'termNo' => Yii::app()->user->settings['pelecard.termNo'],
            'shopNo' => Yii::app()->user->settings['pelecard.shopNo'],
            'creditCard' => $this->fields["card_no"]["value"], //
            'creditCardDateMmyy' => $this->fields["valid_month"]["value"].$this->fields["valid_year"]["value"], //
            'token' => '', //
            'total' => $this->fields["sum"], //
            'currency' => '1',
            
            'cvv2' => $this->cvv2, //
            'id' => $this->id, //
            'authNum' => '', //
            'parmx' => 'test' //0## NO TRAILING COMMA
        );
        //print_r($params);
        //$url = $this->url . $this->operation;
        //$output = Yii::app()->curl
        //        ->addAuth(Yii::app()->user->settings['pelecard.userName'], Yii::app()->user->settings['pelecard.password'])
        //->setOptions(array('Content-Type: application/xml'))
        //        ->setOptions(array('Content-Type: application/text'))
        //        ->post($url, http_build_query($params));
        //$output = strstr($output, "\r\n\r\n");
        //$output = str_replace("\r\n\r\n", "", $output);
        //return $output;

        list ($code, $result) = $this->do_post_request($params);
        return array($code ,$result);//$code
        //print_r($output->html_url);
        /*

          if (isset($output->html_url)) {
          $this->url = $output->html_url;
          $this->save();
          return $this->url;
          } else {

          return false;
          } */
        //return ;
    }

    private function do_post_request($data, $optional_headers = null) {
        $params = array('http' => array(
                'method' => 'POST',
                'content' => http_build_query($data)
        ));
        //echo "Body: " . http_build_query($data) . "<br>";
        $url = $this->url . $this->operation;

        if ($optional_headers !== null) {
            $params['http']['header'] = $optional_headers;
        }
        $ctx = stream_context_create($params);
        $fp = @fopen($url, 'rb', false, $ctx);
        if (!$fp) {
            throw new Exception("Problem with $url, $php_errormsg");
        }
        $response = @stream_get_contents($fp);
        if ($response === false) {
            throw new Exception("Problem reading data from $url, $php_errormsg");
        }
        return array(substr(trim(strip_tags($response)), 0, 3), trim(strip_tags($response)));
    }

}
