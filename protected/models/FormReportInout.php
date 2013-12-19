<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormReportInout
 *
 * @author adam
 */
class FormReportInout extends CFormModel
{
    public $year;
    public $from_date;
    public $to_date;
    
    
    public function rules()
	{
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
        $sum=0;
            
        $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');
        
        
        $from_date=date($phpdbdatetime,CDateTimeParser::parse($this->from_date,$yiidatetimesec));
        $to_date=date($phpdbdatetime,CDateTimeParser::parse($$this->to_date,$yiidatetimesec));
        
        
        $criteria=new CDbCriteria;
        $criteria->condition="type = :type";
        $criteria->addCondition("date BETWEEN :from_date AND :to_date");
        $criteria->params=array(
            ':type' => 14,
            ':from_date' => $from_date,
            ':to_date' => $to_date,
          );

        $accounts= Transactions::model()->findAll($criteria);
        $sum=0;
        $data=array();
        foreach($accounts as $account){
                
                $sum=$account->getTotal($this->from_date.":00",$this->to_date.":00"); 
                if($sum!=0)
                    $data[]=array('id'=>$account->id,'name'=>$account->name,'sum'=>$sum,'id6111'=>$account->id6111);
        }
        return $data;
    }
    
    public function search(){
        
        
        $data=$this->calc(3);//incomes
        $data=array_merge($data,$this->calc(4));//outcomes
        
        
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
