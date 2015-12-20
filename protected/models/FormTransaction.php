<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\models;

use Yii;
use yii\base\Model;

class FormTransaction extends Model {

    public $sourcepos = 0;
    public $sourceneg = 0;
    public $balance = 0;
    public $sumpos = array();
    public $sumneg = array();
    public $ops = array();
    public $valuedates = [];
    public $Docs = null;
    public $refnum1_ids = '';
    public $refnum1 = '';
    public $refnum2 = '';
    public $details = '';
    public $valuedate = '';
    public $currency_id = '';
    public $account_id = '';

    //public $sum;
    //public $date;
    //public $cur_id;

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'num' => Yii::t('app', 'Num'),
            'account_id' => Yii::t('app', 'Account'),
            'type' => Yii::t('app', 'Type'),
            'refnum1' => Yii::t('app', 'Refnum 1'),
            'refnum2' => Yii::t('app', 'Refnum 2'),
            'valuedate' => Yii::t('app', 'Issue Date'),
            //'due_date' => Yii::t('app', 'Due Date'),
            'reg_date' => Yii::t('app', 'Create Date'),
            'details' => Yii::t('app', 'Details'),
            'currency_id' => Yii::t('app', 'Currency'),
            'sum' => Yii::t('app', 'Sum'),
            'leadsum' => Yii::t('app', 'Lead Sum'),
            'owner_id' => Yii::t('app', 'Owner'),
            'linenum' => Yii::t('app', 'Line No.'),
            'type' => Yii::t('app', 'Type'),
        );
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['account_id', 'valuedate', 'currency_id', 'details'], 'required'),
            array(['account_id'], 'number', 'integerOnly' => true),
            array(['refnum1', 'refnum2', 'details'], 'string', 'max' => 255),
            array(['valuedate', 'refnum2', 'refnum1_ids', 'ops', 'sumneg', 'sumpos', 'sourcepos', 'sourceneg', 'valuedates'], 'safe'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
        );
    }

    public function calc() {
        
    }

    public function save() {
        if (!$this->validate()) {
            return false;
        }


        $transAction = new Transactions;
        $transAction->type = \app\helpers\Linet3Helper::getSetting('transactionType.manual');
        if (isset($this->sourcepos) && (float) $this->sourcepos != 0)
            $sum = $this->sourcepos;
        else
            $sum = $this->sourceneg * -1;
        $transAction->owner_id = Yii::$app->user->id;
        $transAction->linenum = 1;
        $transAction->currency_id = $this->currency_id;
        $transAction->refnum1 = $this->refnum1_ids;
        $transAction->refnum2 = $this->refnum2;
        $transAction->details = $this->details;
        $transAction->valuedate =  $this->valuedate;

        $trans = Yii::$app->db->beginTransaction(\yii\db\Transaction::READ_UNCOMMITTED);
        //-shuld start transaction here so lets lock down
        try {
            $transAction = $transAction->addSingleLine($this->account_id, $sum);

            if ($transAction) {
                foreach ($this->ops as $i => $acc) {

                    if (isset($this->sumpos[$i]) && (float) $this->sumpos[$i] != 0)
                        $smallsum = $this->sumpos[$i];
                    else
                        $smallsum = $this->sumneg[$i] * -1;
                    if ( abs($smallsum)>0.0001){
                        $transAction = $transAction->addSingleLine($acc, $smallsum,$this->valuedates[$i]);
                    }
                }
            }

            //commit it here
            $trans->commit();
        } catch (\Exception $e) {
            $trans->rollBack();
            $message = $e->getMessage();
            $this->addError('details', $message);
            return false;
        }

        //put your code here
        return true;
    }

}
