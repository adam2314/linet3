<?php

class DebitRegularType {
    public $type;//needs to have!
    public $sum;//needs to have!
    public $line;//needs to have!
    
    private $url = 'https://ws101.pelecard.biz/webservices.asmx/';
    private $operation = 'DebitRegularType';

    const CUR_ILS = 1;
    const CUR_USD = 2;
    const CUR_EUR = 978;

    
    
    
    
    
    public $creditCard;
    public $mm;
    public $yy;
    public $total;
    public $currency;
    public $cvv2;
    public $id;
    //public $paymentsNo;
    //public $firstPymnt;
    public $parmx = '';

    public function stoppage() {//needs to have!

        $months = array();
        for($i=1;$i<=12;$i++){
            $tmp=sprintf("%02d",$i);
            $months[$tmp]=$tmp;
        }
        $years = array();
        for($i=0;$i<8;$i++){
            $tmp=sprintf("%02d",date("y")+$i);
            $years[$tmp]=$tmp;
        }
        
        $monthSelect = CHtml::dropDownList('bill[mm]', 0, $months);
        $yearSelect = CHtml::dropDownList('bill[yy]', 0, $years);

        return '
	<form id="billForm" method="post" action="' . Yii::app()->createUrl('/payment/bill') . '">
                <input type="hidden" id="Payment_id" name="Payment[id]" value="' . $this->type . '">
                <label>Card Number:</label>
                <input id="billcreditCard" name="bill[creditCard]" />
                <label>Expiration Date:</label>
                ' . $monthSelect . '/' . $yearSelect . '<br />
                <label>CVV:</label>
                <input id="billCvv2" name="bill[cvv2]" />
                <label>ID:</label>
                <input id="billId" name="bill[id]" />
                <label>Sum:</label>
                <input id="billTotal" name="bill[total]" readonly value="' .$this->sum. '">
                
                <a href="javascript:sendBill();" class="btn btn-primary">Bill</a>
                
                <div id=""></div>
	</form>';
    }

    public function bill() {//needs to have!



        $params = array(
            'userName' => Yii::app()->user->settings['pelecard.userName'],
            'password' => Yii::app()->user->settings['pelecard.password'],
            'termNo' => Yii::app()->user->settings['pelecard.termNo'],
            'shopNo' => Yii::app()->user->settings['pelecard.shopNo'],
            'creditCard' => $this->creditCard, //
            'creditCardDateMmyy' => $this->mm.$this->yy, //
            'token' => '', //
            'total' => $this->total, //
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
