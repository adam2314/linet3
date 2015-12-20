<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\models;
use Yii;
use yii\base\Model;
class FormDeposit  extends Model{
    public $account_id='';
    public $refnum='';
    public $currency_id='';
    public $date;
    public $cheq_sum=0;
    public $cheq_count=0;
    public $cash_sum=0;
    public $cash_count=0;
    public $Deposit=array();
    public $Total=array();
    
    
    public function attributeLabels() {
        return array(
            'account_id' => Yii::t('app', 'Account'),
            'currency_id' => Yii::t('app', 'Currency'),
            'date' => Yii::t('app', 'Date'),
            'sum' => Yii::t('app', 'Sum'),
            'refnum' => Yii::t('app', 'Refnum'),
            'cheq_sum' => Yii::t('app','Check Sum'),
            'cash_sum' => Yii::t('app', 'Cash Sum'),
            
        );
    }
    
    
    
    public function beforeSave(){
            //$this->date=date("Y-m-d H:i:s",CDateTimeParser::parse($this->date,Yii::$app->locale->getDateFormat('yiishort')));
            
            //return true;
            return parent::beforeSave();
        }
        
        public function afterSave(){
           //$this->date=date(Yii::$app->locale->getDateFormat('phpshort'),strtotime($this->date));
            
            return parent::afterSave();
        }
    
    
    public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array(['account_id', 'refnum', 'date', 'Deposit', 'Total'], 'required'),
                        array(['account_id', 'refnum', 'date', 'Deposit', 'Total'], 'safe'),
                    	);
	}
    
    public function save(){
            //print_r($this->Deposit);
            $num=0;
            //$linenum=1;
            $tranType=\app\helpers\Linet3Helper::getSetting('transactionType.chequedeposit');
            if(($this->refnum=='')||($this->date=='')||!is_array($this->Deposit)){
                return false;
            }
            
            $accout=new Transactions();
            $accout->type=$tranType;
            $accout->refnum1='';//$this->refnum;
            $accout->refnum2=$this->refnum;
            $accout->details=Yii::t('app','Deposit')." #".$this->refnum;
            $accout->valuedate= $this->date.$this->refnum;
            $accout->owner_id=Yii::$app->user->id;
            $accout->linenum=1;
            
            
            
            $transaction = Yii::$app->db->beginTransaction(\yii\db\Transaction::READ_UNCOMMITTED);//-shuld start transaction here
            try {
                foreach($this->Deposit as $line=>$val){
                    list($a, $b ) =  explode(',', $line);
                    $cheq=  Doccheques::findOne(array("doc_id"=>$a,"line"=>$b));
                    $oppt_acc=  PaymentType::findOne($cheq->type)->oppt_account_id;

                    $accout->currency_id=$cheq->currency_id;
                    $accout->addDoubleLine($oppt_acc,$this->account_id,$cheq->sum);

                    $cheq->bank_refnum=$num;
                    $cheq->save();
                }
            $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                $message = $e->getMessage();
                $this->addError('refnum',  $message );
            }
            

        return true;//num
    }
}
