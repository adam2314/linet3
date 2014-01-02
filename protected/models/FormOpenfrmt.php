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
    private $iniArr;
    private $docArr;
    
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
        //$this->iniArr=array('b110'=>0,'b100'=>0,'m100'=>0,'c100'=>0,'d100'=>0,'d110'=>0,'d120'=>0,);
        //$this->docArr=array(0=>0,305=>0,300=>0,);
        $bkmv='';
        $line=1;
        $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');

        $from_date=date($phpdbdatetime,CDateTimeParser::parse($this->from_date.":00",$yiidatetimesec));
        $to_date=date($phpdbdatetime,CDateTimeParser::parse($this->to_date.":00",$yiidatetimesec));
        
        //$types=array(3,4,9,11,13,14);
        
        
        
        
        //accounts
        $criteria=new CDbCriteria;
        $accounts= Accounts::model()->findAll($criteria);
        $record=array('id'=>'b110','name'=>'','count'=>0);
        foreach($accounts as $account){
                $line++;
                $bkmv.=$account->openfrmt($line,$from_date,$to_date)."<br />\n"; 
                $record['count']++;
        }
        $this->iniArr[]=$record;
        
        
        //items
        $criteria=new CDbCriteria;
        $items= Item::model()->findAll($criteria);
        $record=array('id'=>'m100','name'=>'','count'=>0);
        foreach($items as $item){
                $line++;
                $bkmv.=$item->openfrmt($line,$from_date,$to_date)."<br />\n"; 
                $record['count']++;
        }
        $this->iniArr[]=$record;
        //
        //transactions
        $criteria=new CDbCriteria;
        $criteria->condition="valuedate BETWEEN :from_date AND :to_date";
        $criteria->params=array(
            ':from_date' => $from_date,
            ':to_date' => $to_date,
          );
        $transactions= Transactions::model()->findAll($criteria);
        $record=array('id'=>'b100','name'=>'','count'=>0);
        foreach($transactions as $transaction){
                $line++;
                $bkmv.=$transaction->openfrmt($line,$from_date,$to_date)."<br />\n"; 
                $record['count']++;

        }
        $this->iniArr[]=$record;
        
        //docs
        $criteria=new CDbCriteria;
        $criteria->condition="due_date BETWEEN :from_date AND :to_date";
        $criteria->params=array(
            ':from_date' => $from_date,
            ':to_date' => $to_date,
          );
        $docs= Docs::model()->findAll($criteria);
        $record=array('id'=>'c100','name'=>'','count'=>0);
        $d110=array('id'=>'d110','name'=>'','count'=>0);
        $d120=array('id'=>'d120','name'=>'','count'=>0);
        
        $this->docArr[305]=0;
        $this->docArr[400]=0;
        $this->docArr[0]=0;
        foreach($docs as $doc){
                $line++;
                $bkmv.=$doc->openfrmt($line,$from_date,$to_date)."<br />\n"; 
                foreach($doc->docDetailes as $detial){
                    $line++;
                    $bkmv.=$detial->openfrmt($line,$from_date,$to_date)."<br />\n"; 
                    $d110['count']++;
                }
                foreach($doc->docCheques as $detial){
                    $line++;
                    $bkmv.=$detial->openfrmt($line,$from_date,$to_date)."<br />\n";
                    $d120['count']++;
                }
                $this->docArr[$doc->getType()]++;
                $record['count']++;
        }
        $this->iniArr[]=$record;
        $this->iniArr[]=$d110;
        $this->iniArr[]=$d120;
        //A000
        
        print_r($this->iniArr);
        print_r($this->docArr);
        return $bkmv;      
    }
    //put your code here
    
    
     public function docsTable(){
        return new CArrayDataProvider($this->docArr,
                 array(
                                'pagination'=>array(
                                    'pageSize'=>100,
                            ),
                )             
          );
    }
    
    public function bkmvTable(){
        return new CArrayDataProvider($this->iniArr,
                 array(
                                'pagination'=>array(
                                    'pageSize'=>100,
                            ),
                )             
          );
    }
    
}
