<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormDeposit
 *
 * @author adam
 */
class FormDeposit  extends CFormModel{
    public $account_id=0;
    public $refnum=0;
    public $currency_id='';
    public $date;
    public $sum=0;
    public $Deposit=array();
    public $Total=array();
    
    public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('account_id, currency_id, refnum, date, sum, Deposit, Total', 'required'),
                        array('account_id, currency_id, refnum, date, sum, Deposit, Total', 'safe'),
                    	);
	}
    
    public function save(){
        return true;
    }
    //put your code here
}
