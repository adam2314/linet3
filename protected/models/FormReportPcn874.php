<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormProfloss
 *
 * @author adam
 */
class FormReportPcn874 extends CFormModel{
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
    
    private function calc($account_type){
        $criteria=new CDbCriteria;
        $criteria->condition="type = :type";
        $criteria->params=array(
            ':type' => $account_type,
          );

        $accounts= Accounts::model()->findAll($criteria);
        $sum=0;
        $data=array();
        foreach($accounts as $account){
                
                $sum=$account->getTotal($this->from_date.":00",$this->to_date.":00"); 
                if($sum!=0)
                    $data[]=array('id'=>$account->id,'name'=>$account->name,'sum'=>$sum,'id6111'=>$account->id6111);
        }
        return $data;
    }
    
    protected function start(){
        //stringfy a company by pcn874
        //A1    type
        //N9    vatid
        //N6    file contacet date YYYYMM
        //N1    1
        //N8    file date YYYYMMDD
        //A1    +/- total without vat
        //N11   total without vat
        //N9    total vat
        //A1    +/- total without vat not standert
        //N11   total without vat not standert
        //
        //N9    doc number
        //N9    vat sum(round)
        //A1    +\-
        //N10   inv sum(round)
        //N9    000000000
        
        
    }






    public function make(){
        $text='';
            
        $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');

        $from_date=date($phpdbdatetime,CDateTimeParser::parse($this->from_date.":00",$yiidatetimesec));
        $to_date=date($phpdbdatetime,CDateTimeParser::parse($this->to_date.":00",$yiidatetimesec));
        
        $types=array(3,4,9,11,13,14);
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
        return $text;      
    }
    
    
    
    public function search(){
        $data= array();
        echo $this->make();
        exit;
        //$data=$this->calc(3);//incomes
        //$data=array_merge($data,$this->calc(4));//outcomes
        
        
        return new CArrayDataProvider($data,
                 array(
                                'pagination'=>array(
                                    'pageSize'=>100,
                            ),
                )             
          );
    }
    //put your code here
}
