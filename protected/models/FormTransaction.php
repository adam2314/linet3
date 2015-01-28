<?php
/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class FormTransaction  extends CFormModel{

    public $sourcepos = 0;
    public $sourceneg = 0;
    public $balance = 0;
    public $sumpos = array();
    public $sumneg = array();
    public $ops = array();
    public $Docs=null;
    
    public $refnum1_ids='';
    public $refnum1='';
    public $refnum2='';
    public $details='';
    public $valuedate='';
    public $currency_id='';
    public $account_id='';
    //public $sum;
    //public $date;
    //public $cur_id;
    
    public function attributeLabels() {
        return array(
            'id' => Yii::t('labels', 'ID'),
            'num' => Yii::t('labels', 'Num'),
            'account_id' => Yii::t('labels', 'Account'),
            'type' => Yii::t('labels', 'Type'),
            'refnum1' => Yii::t('labels', 'Refnum 1'),
            'refnum2' => Yii::t('labels', 'Refnum 2'),
            'valuedate' => Yii::t('labels', 'Issue Date'),
            //'due_date' => Yii::t('labels', 'Due Date'),
            'reg_date' => Yii::t('labels', 'Create Date'),
            'details' => Yii::t('labels', 'Details'),
            'currency_id' => Yii::t('labels', 'Currency'),
            'sum' => Yii::t('labels', 'Sum'),
            'leadsum' => Yii::t('labels', 'Lead Sum'),
            'owner_id' => Yii::t('labels', 'Owner'),
            'linenum' => Yii::t('labels', 'Line No.'),
            'type' => Yii::t('labels', 'Type'),
        );
    }
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('account_id, valuedate, currency_id', 'required'),
            array('account_id', 'numerical', 'integerOnly' => true),
            array('refnum1, refnum2, details', 'length', 'max' => 255),
            array('valuedate, refnum2, refnum1, ops, sumneg, sumpos, sourcepos, sourceneg', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            
        );
    }
    
    public function calc(){
        
        
        
    }

    public function save() {
        if (!$this->validate()) {
            return false;
        }


        $transAction = new Transactions;
        $valuedate = date("Y-m-d H:m:s", CDateTimeParser::parse($this->valuedate, Yii::app()->locale->getDateFormat('yiishort')));

        $transAction->type = Yii::app()->user->settings['transactionType.manual'];
        if (isset($this->sourcepos) && (float) $this->sourcepos != 0)
            $sum = $this->sourcepos;
        else
            $sum = $this->sourceneg * -1;

        //$model->sum=$docdetail->price*$action;
        $transAction->owner_id = Yii::app()->user->id;
        $transAction->linenum = 1;
        $transAction->currency_id = $this->currency_id;
        $transAction->refnum1 = $this->refnum1;
        $transAction->refnum2 = $this->refnum2;
        $transAction->details = $this->details;
        $transAction->valuedate = $valuedate;
        //$transAction->refnum1 = $transAction->refnum1_ids;

        
        $transAction = $transAction->addSingleLine($this->account_id,$sum); 
        
        if ($transAction) {
            foreach ($this->ops as $i=>$acc) {

                if (isset($this->sumpos[$i]) && (float) $this->sumpos[$i] != 0)
                    $smallsum = $this->sumpos[$i];
                else
                    $smallsum = $this->sumneg[$i] * -1;

                $transAction = $transAction->addSingleLine($acc,$smallsum); 

            }
        }
        //put your code here
        return true;
    }

}
