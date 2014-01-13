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
    
    private $id;
    private $line=1;

    private $iniArr;
    private $docArr;
    private $docSumArr;
    
    public $bkmvId;
    public $iniId;
            
    
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
    
    public function read(){
        
        
        //new company
        
        //new accounts
        
        //new items
        
        //new docs
        
        //new transactions
        
        
    }






    public function make(){
        $this->id= rand(0,999999999999999);
        //$this->iniArr=array('b110'=>0,'b100'=>0,'m100'=>0,'c100'=>0,'d100'=>0,'d110'=>0,'d120'=>0,);
        //$this->docArr=array(0=>0,305=>0,300=>0,);
        $bkmv='';
        //$this->line=1;
        $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');

        $from_date=date($phpdbdatetime,CDateTimeParser::parse($this->from_date.":00",$yiidatetimesec));
        $to_date=date($phpdbdatetime,CDateTimeParser::parse($this->to_date.":00",$yiidatetimesec));
        
        //$types=array(3,4,9,11,13,14);
        
        
        
        
        //accounts
        $criteria=new CDbCriteria;
        $accounts= Accounts::model()->findAll($criteria);
        $record=array('id'=>'B110','name'=>'','count'=>0);
        foreach($accounts as $account){
                $this->line++;
                $bkmv.=$account->openfrmt($this->line,$from_date,$to_date); 
                $record['count']++;
        }
        $this->iniArr[]=$record;
        
        
        //items
        $criteria=new CDbCriteria;
        $items= Item::model()->findAll($criteria);
        $record=array('id'=>'M100','name'=>'','count'=>0);
        foreach($items as $item){
                $this->line++;
                $bkmv.=$item->openfrmt($this->line,$from_date,$to_date); 
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
        $record=array('id'=>'B100','name'=>'','count'=>0);
        foreach($transactions as $transaction){
                $this->line++;
                $bkmv.=$transaction->openfrmt($this->line,$from_date,$to_date); 
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
        $record=array('id'=>'C100','name'=>'','count'=>0);
        $d110=array('id'=>'D110','name'=>'','count'=>0);
        $d120=array('id'=>'D120','name'=>'','count'=>0);
        

        foreach($docs as $doc){
                $this->line++;
                $bkmv.=$doc->openfrmt($this->line,$from_date,$to_date); 
                foreach($doc->docDetailes as $detial){
                    $this->line++;
                    $bkmv.=$detial->openfrmt($this->line,$from_date,$to_date); 
                    $d110['count']++;
                }
                foreach($doc->docCheques as $detial){
                    $this->line++;
                    $bkmv.=$detial->openfrmt($this->line,$from_date,$to_date);
                    $d120['count']++;
                }
                $type=$doc->getType();
                $this->docArr[$type]=isset($this->docArr[$type])?$this->docArr[$type]+1:0;
                $this->docSumArr[$type]=isset($this->docSumArr[$type])?$this->docSumArr[$type]+$doc->total:$doc->total;
                $record['count']++;
        }
        $this->iniArr[]=$record;
        $this->iniArr[]=$d110;
        $this->iniArr[]=$d120;
        
        
        $company=Settings::model()->findByPk('company.name');
        //A100
        $bkmv=$company->a100(1,$this->id).$bkmv;

        //Z900
        $bkmv=$bkmv.$company->z900($this->line+1,$this->id,$this->line+1);
        
        
        
        $bkmvFile=new Files;
        $bkmvFile->name='bkmvdata.txt';
        $bkmvFile->path='openformt/bkmvdata-'.$this->id.'.txt';//
        $bkmvFile->expire=360;
        $bkmvFile->writeFile($bkmv);
        $this->bkmvId=$bkmvFile->id;
        
        
        
        //A000
        $ini=$company->a000(1,$this->id,$this->line+1);
        foreach($this->iniArr as $line){
            $ini.=$line['id'].sprintf("%015d",$line['count'])."\r\n";
        }
        //Z
        
        $iniFile=new Files;
        $iniFile->name='ini.txt';
        $iniFile->path='openformt/ini-'.$this->id.'.txt';//
        $iniFile->expire=360;
        $iniFile->writeFile($ini);
        $this->iniId=$iniFile->id;
        
        
        
        return $bkmv;      
    }
    

    
     public function docsTable(){
         
       $array=array();
       if(isset($this->docArr)){
        foreach($this->docArr as $key=>$value){
            $array[]=array('id'=>$key,'name'=>'','count'=>$value,'sum'=>$this->docSumArr[$key]);
        }
       }  
         
        return new CArrayDataProvider($array,
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
