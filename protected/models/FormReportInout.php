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
    
    private function calc($accounts=array(),$types=array()){
        $sum=0;
            
        $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');
        
        
        $from_date=date($phpdbdatetime,CDateTimeParser::parse($this->from_date,$yiidatetimesec));
        $to_date=date($phpdbdatetime,CDateTimeParser::parse($this->to_date,$yiidatetimesec));
        
        
        $criteria=new CDbCriteria;
        $criteria->condition="date BETWEEN :from_date AND :to_date";
        $criteria->params=array(
            ':from_date' => $from_date,
            ':to_date' => $to_date,
         );
        $criteria->compare('type', $types);
        $criteria->compare('account_id', $accounts);
   

        $trans= Transactions::model()->findAll($criteria);
        $sum=0;
        $data=array();
        foreach($trans as $tran){
                
                $sum=$tran->sum;
                if($sum!=0)
                    $data[]=array('id'=>$tran->id,'name'=>$tran->account_id,'sum'=>$sum,'id6111'=>$tran->id);
        }
        return $data;
    }
    
    public function search(){
        //search
        //find all relvent transctions by type aginst income accounts
        //types:$RelevantTypes = array(INVOICE, SUPINV, MANINVOICE,INVRCPT,DOCPROFORMA);
        //($type == MANINVOICE) || ($type == INVOICE) || ($type == INVRCPT)||($type == DOCPROFORMA)||($type == SUPINV)
        $types=array(
            /*
            0 Manual
1Invoice
2Supplier Invoicve
3Receipt
4CHEQUEDEPOSIT
5Supplier Payment
6vat
7STORENO
8BANKMATCH
9SRCTAX
10PATTERN
11MANINVOICE
12MANRECEIPT
14TRAN_PRETAX
15TRAN_SALARY
16OPBALANCE
17RETURNINV
18INVRCPT
19DOCREDIT
20DOCPROFORMA
21DELIVERY
            
            */
            
        );
        $accounts=array();
        $data=$this->calc($accounts,$types);//incomes
        //find all relvent transctions by type aginst outcome accounts
        //(($actype == OUTCOME) || ($actype == OBLIGATIONS)||($actype==ASSETS))
        $types=array();
        $accounts=array();
        
        $data=array_merge($data,$this->calc($accounts,$types));//outcomes
        
        
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
