<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormOpenfrmt
 *
 * @author adam
 */
class FormOpenfrmt extends CFormModel{
    public $year;
    public $from_date;
    public $to_date;
    
    public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('to_date, from_date, year', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('to_date, from_date, year', 'safe', 'on'=>'search'),
		);
	
    
    
    }
    
    public function make(){
        $iniArr=array('b110'=>0,'b100'=>0,'c100'=>0,'d100'=>0,'d110'=>0,'d120'=>0,);
        $bkmv='';    
        $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');

        $from_date=date($phpdbdatetime,CDateTimeParser::parse($this->from_date.":00",$yiidatetimesec));
        $to_date=date($phpdbdatetime,CDateTimeParser::parse($this->to_date.":00",$yiidatetimesec));
        
        //$types=array(3,4,9,11,13,14);
        
        
        
        
        //accounts
        $criteria=new CDbCriteria;
        $accounts= Accounts::model()->findAll($criteria);
        foreach($accounts as $account){
                $bkmv.=$account->openfrmt()."\n"; 
                $iniArr['b110']++;
        }
        //
        //
        //items
        //
        //transactions
        
        //docs
        
            //detiales
            //recips
        
        
        
        
        
        
        
        
        
        
        
        $criteria=new CDbCriteria;
        $criteria->condition="issue_date BETWEEN :from_date AND :to_date";
        $criteria->params=array(
            ':from_date' => $from_date,
            ':to_date' => $to_date,
          );
        $criteria->compare('doctype', $types);
        
        $docs= Docs::model()->findAll($criteria);
        
        foreach($docs as $doc){
                $text.=$doc->pcn874()."\n"; 
                
        }
        $start['sum']=$start['t_vat']+$start['ns_t_vat'];
        
        return $this->start($start)."\n".$text.$this->end();      
    }
    //put your code here
}
