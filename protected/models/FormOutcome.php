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
use app\models\Transactions;
class FormOutcome extends Model {

    public $account_id;
    public $currency_id;
    public $date;
    public $sum;
    public $details;
    public $refnum;
    public $Docs = NULL;
    public $refnum_ids = '';
    public $src_tax; //?
    public $opp_account_id;

    public function attributeLabels() {
        return array(
            'account_id' => Yii::t('app', 'Account'),
            'currency_id' => Yii::t('app', 'Currency'),
            'date' => Yii::t('app', 'Date'),
            'sum' => Yii::t('app', 'Sum'),
            'refnum' => Yii::t('app', 'Refnum'),
            'opp_account_id' => Yii::t('app', 'Opposite account'),
            'details' => Yii::t('app', 'Details'),
            'src_tax' => Yii::t('app', 'Source Tax'),
        );
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['account_id', 'currency_id', 'date', 'sum', 'opp_account_id'], 'required'),
            array(['account_id', 'currency_id', 'date', 'sum', 'src_tax', 'opp_account_id', 'refnum_ids', 'details'], 'safe'),
        );
    }

    public function getRef() {
        return array(); //stub function for refnum widget...
    }

    public function transaction() {

        if ($this->validate()) {
            $num = 0;
            $line = 1;
 
            $tranType = \app\helpers\Linet3Helper::getSetting("transactionType.supplierPayment");
            $tran = new Transactions();

            $tran->num = $num;
            $tran->type = $tranType;
            $tran->refnum1 = $this->refnum_ids;
            $tran->refnum2 = '';
            $tran->valuedate = $this->date;
            $tran->details = $this->details;
            $tran->currency_id = $this->currency_id;
            $tran->owner_id = Yii::$app->user->id;
            $tran->linenum = $line;

            
            $trans = Yii::$app->db->beginTransaction(\yii\db\Transaction::READ_UNCOMMITTED);
            //-shuld start transaction here so lets lock down
            try {
                
                $tran->addSingleLine($this->account_id,$this->sum * -1);
                $tran->addSingleLine($this->opp_account_id,$this->sum * 1);

                if ((int) $this->src_tax <> 0) {
                    $tran->addDoubleLine(5,$this->account_id,$this->src_tax);
                }

                //commit it here
                $trans->commit();
            } catch (\Exception $e) {
                $trans->rollBack();
                $message = $e->getMessage();
                $this->addError('details',  $message );
                return false;
            }


            $this->saveRef($num, $this->sum);





            return true;
        }
        return false;
    }

    public function saveRef($id, $total) {
        $str = $this->refnum; //save new values


        $sum = 0;
        $tmp = explode(",", rtrim($str, ","));
        foreach ($tmp as $id) {//lets do this
            //if($id==$this->id){
            //    throw new \Exception(Yii::t('app','You cannot save doc as a refnum'));
            //}
            $doc = Docs::findOne((int) $id);
            if ($doc !== null) {
                $sum+=$doc->total; //adam: need to multi currency!
                if ($sum <= $total) {
                    $doc->refstatus = Docs::STATUS_CLOSED;
                } else {
                    $doc->refstatus = Docs::STATUS_OPEN;
                }
                $doc->refnum = $id;
                $doc->save();
            }
        }
        //$this->refnum=$str;
    }

}

?>
