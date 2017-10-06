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
class FormReportVat extends Model {

    public $from_month;
    public $year;
    public $from_date;
    public $to_month;
    //public $to_year;
    public $to_date;
    public $step = 0;
    public $selvat_total;
    public $selvat_acc;
    public $buyvat_total;
    public $buyvat_acc;
    public $assetvat_total;
    public $assetvat_acc;
    public $income_sum_novat = 0;
    public $income_sum = 0;
    public $payvat_total = 0;
    public $payvat_acc;

    public function init() {
        parent::init();
        // company.tax.vat
        $this->year = date('Y');
        $this->from_month = date('m')-1-\app\helpers\Linet3Helper::getSetting('company.tax.vat');
        $this->to_month = date('m')-1;
    }
    
    public function attributeLabels() {
        return array(
            'from_month' => Yii::t('app', 'From Month'),
            'to_month' => Yii::t('app', 'To Month'),
            'year' => Yii::t('app', 'Year'),
            
            'income_sum_novat' => Yii::t('app', 'Income Sum no VAT'),
            'income_sum' => Yii::t('app', 'Income Sum VAT not Included'),
            'selvat_total' => Yii::t('app', 'Sale VAT total'),
            'buyvat_total' => Yii::t('app', 'Buy VAT total'),
            'assetvat_total' => Yii::t('app', 'Asset VAT total'),
            'payvat_total' => Yii::t('app', 'Pay VAT total'),
        );
    }
    
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['from_month', 'to_month', 'year'], 'required'),
            array(['from_month'], 'compare', 'compareAttribute' => 'to_month', 'operator' => '<=', 'type' => 'number'),
            array(['to_month'], 'compare', 'compareAttribute' => 'from_month', 'operator' => '>=', 'type' => 'number'),
            array(['payvat_total', 'income_sum', 'income_sum_novat', 'buyvat_total', 'buyvat_acc', 'assetvat_total', 'assetvat_acc', 'selvat_total', 'selvat_acc', 'step', 'to_month', 'to_date', 'from_month', 'from_date', 'year',], 'safe'),
            array(['payvat_total', 'income_sum', 'income_sum_novat', 'buyvat_total', 'buyvat_acc', 'assetvat_total', 'assetvat_acc', 'selvat_total', 'selvat_acc', 'step', 'to_month', 'to_date', 'from_month', 'from_date', 'year',], 'safe', 'on' => 'search'),
        );
    }
    
    private function dates(){
        
        $last = 31;
        while (!checkdate($this->to_month, $last, $this->year)) {
            $last--;
        }

        if (strlen($this->from_month) == 1)
            $this->from_month = "0{$this->from_month}";
        if (strlen($this->to_month) == 1)
            $this->to_month = "0{$this->to_month}";

        $this->from_date = "{$this->year}-{$this->from_month}-01 00:00:00";
        $this->to_date = "{$this->year}-{$this->to_month}-$last 23:59:59";
    }
    

    public function calcPay() {
        $this->step = 1;
        $this->dates();



        $incomes = Accounts::findAllByType(3); //incomes
        foreach ($incomes as $account) {
            //echo $transaction->date.','.$transaction->sum.'<br>';
            if ($account->src_tax == 0)
                $this->income_sum_novat+=$account->getTotal($this->from_date, $this->to_date);
            else
                $this->income_sum+=$account->getTotal($this->from_date, $this->to_date);
        }



        $this->selvat_acc = \app\helpers\Linet3Helper::getSetting('company.acc.sellvat');
        $selvat = Accounts::findOne($this->selvat_acc);
        $this->selvat_total = $selvat->getTotal($this->from_date, $this->to_date);

        $this->buyvat_acc = \app\helpers\Linet3Helper::getSetting('company.acc.buyvat');
        $buyvat = Accounts::findOne($this->buyvat_acc);
        $this->buyvat_total = $buyvat->getTotal($this->from_date, $this->to_date) * -1; //hAS TO INVERT

        $this->assetvat_acc = \app\helpers\Linet3Helper::getSetting('company.acc.assetvat');
        $assetvat = Accounts::findOne($this->assetvat_acc);
        $this->assetvat_total = $assetvat->getTotal($this->from_date, $this->to_date) * -1;//hAS TO INVERT

        $this->payvat_total = $this->selvat_total - ($this->buyvat_total + $this->assetvat_total);
        return $this->payvat_total;
    }

    public function pay() {
        $this->dates();


        $this->payvat_acc = \app\helpers\Linet3Helper::getSetting('company.acc.payvat');

        $date = $this->to_date;

        $cur = \app\helpers\Linet3Helper::getSetting('company.cur');
        $owner = Yii::$app->user->id;
        $line = 1;



        $accout = new Transactions();
        $accout->account_id = $this->selvat_acc;
        $accout->type = 6;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'vat')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->selvat_total * -1.0;
        $line++;
        $num = $accout->save();

        $accout = new Transactions();
        $accout->account_id = $this->payvat_acc;
        $accout->type = 6;
        $accout->num = $num;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'vat')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->selvat_total;
        $line++;
        $accout->save();

        $accout = new Transactions();
        $accout->account_id = $this->buyvat_acc;
        $accout->type = 6;
        $accout->num = $num;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'vat')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->buyvat_total;
        $line++;
        $accout->save();

        $accout = new Transactions();
        $accout->account_id = $this->payvat_acc;
        $accout->type = 6;
        $accout->num = $num;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'vat')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->buyvat_total * -1.0;
        $line++;
        $accout->save();

        $accout = new Transactions();
        $accout->account_id = $this->assetvat_acc;
        $accout->type = 6;
        $accout->num = $num;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'vat')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->assetvat_total;
        $line++;
        $accout->save();

        $accout = new Transactions();
        $accout->account_id = $this->payvat_acc;
        $accout->type = 6;
        $accout->num = $num;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'vat')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->assetvat_total * -1.0;
        $line++;
        $accout->save();

        //$s = $this->selvat_total * -1.0;
        //$tnum = Transaction(0, VAT, SELLVAT, $ref1, $ref2, $date, _('VAT'), $s);
        //$tnum = Transaction($tnum, VAT, PAYVAT, $ref1, $ref2, $date, _('VAT'), $sellvat);
        //$b = $this->buyvat_total * -1.0;
        //$tnum = Transaction(0, VAT, BUYVAT, $ref1, $ref2, $date, _('VAT'), $buyvat);
        //$tnum = Transaction($tnum, VAT, PAYVAT, $ref1, $ref2, $date, _('VAT'), $b);
        //$a = $this->assetvat_total * -1.0;
        //$tnum = Transaction(0, VAT, ASSETVAT, $ref1, $ref2, $date, _('VAT'), $assetvat);
        //$tnum = Transaction($tnum, VAT, PAYVAT, $ref1, $ref2, $date, _('VAT'), $a);
    }

}
