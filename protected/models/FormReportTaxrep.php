<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class FormReportTaxrep extends CFormModel {

    public $from_month;
    public $year;
    public $from_date;
    public $to_month;
    public $to_date;
    public $step = 0;
    //public $selvat_total;
    //public $selvat_acc;
    //public $buyvat_total;
    //public $buyvat_acc;
    //public $assetvat_total;
    //public $assetvat_acc;

    private $custtax_acc;
    public $custtax_sum;
    public $custtax_total;
    public $income_sum = 0;
    public $tax_rate = 0;
    public $tax_sum = 0;
    public $tax_total = 0;
    public $tax_acc;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function attributeLabels() {
        return array(
            'from_month' => Yii::t('labels', 'From Month'),
            'to_month' => Yii::t('labels', 'To Month'),
            'year' => Yii::t('labels', 'Year'),
            
            'income_sum' => Yii::t('labels', 'Income Sum'),
            'tax_rate' => Yii::t('labels', 'Tax Rate'),
            'tax_sum' => Yii::t('labels', 'Tax Sum'),
            'custtax_total' => Yii::t('labels', 'Withholding tax total'),
            'custtax_sum' => Yii::t('labels', 'Withholding tax sum'),
            'tax_total' => Yii::t('labels', 'Tax to pay'),
            
        );
        
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('from_month, to_month, year', 'required'),
            array('from_month', 'compare', 'compareAttribute' => 'to_month', 'operator' => '<='),
            array('to_month', 'compare', 'compareAttribute' => 'from_month', 'operator' => '>='),
            array('tax_rate, income_sum, custtax_sum, custtax_total, tax_total, tax_sum, step, to_month, to_date, from_month, from_date, year,', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('tax_rate, income_sum, custtax_sum, custtax_total, tax_total, tax_sum, step, to_month, to_date, from_month, from_date, year,', 'safe', 'on' => 'search'),
        );
    }

    private function dates() {

        $last = 31;
        while (!checkdate($this->to_month, $last, $this->year)) {
            $last--;
        }

        if (strlen($this->from_month) == 1)
            $this->from_month = "0{$this->from_month}";
        if (strlen($this->to_month) == 1)
            $this->to_month = "0{$this->to_month}";

        $this->from_date = "01/{$this->from_month}/{$this->year} 00:00:00";
        $this->to_date = "$last/{$this->to_month}/{$this->year} 23:59:59";
    }

    public function calcPay() {
        $this->step = 1;
        $this->dates();





        $this->income_sum = Acctype::model()->findByPk(3)->getTotal($this->from_date, $this->to_date);

        $this->tax_rate = Yii::app()->user->settings['company.tax.rate'];

        //$tax
        $this->tax_sum = $this->income_sum * ($this->tax_rate / 100);


        $this->custtax_acc = Yii::app()->user->settings['company.acc.custtax'];
        $this->custtax_sum = Accounts::model()->findByPk($this->custtax_acc)->getTotal($this->from_date, $this->to_date);    //*-1    
        $this->custtax_total = Accounts::model()->findByPk($this->custtax_acc)->getTotal(0, $this->to_date);



        if ($this->custtax_total > $this->tax_sum)
            $this->custtax_total = $this->tax_sum;

        $this->tax_total = $this->tax_sum + $this->custtax_total;


        return $this->tax_total;
    }

    public function pay() {
        $this->dates();
        $yiidatetimesec = Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime = Yii::app()->locale->getDateFormat('phpdbdatetime');

        $date = date($phpdbdatetime, CDateTimeParser::parse($this->to_date, $yiidatetimesec));




        /*
          $tnum = Transaction(0, TRAN_PRETAX, IRS, $ref1, $ref2, $date, $details, $this->tax_sum);
          $tnum = Transaction($tnum, TRAN_PRETAX, PRETAX, $ref1, $ref2, $date, $details, $this->tax_sum * -1.0);
          $tnum = Transaction($tnum, TRAN_PRETAX, IRS, $ref1, $ref2, $date, $details, $this->custtax_total);
          $tnum = Transaction($tnum, TRAN_PRETAX, CUSTTAX, $ref1, $ref2, $date, $details, $this->custtax_total * -1.0);

         */



        $irs = Yii::app()->user->settings['company.acc.irs'];
        $pretax = Yii::app()->user->settings['company.acc.pretax'];
        $custtax = Yii::app()->user->settings['company.acc.custtax'];
        $cur = Yii::app()->user->settings['company.cur'];
        $owner = Yii::app()->user->id;
        $line = 1;


        $accout = new Transactions();
        $accout->account_id = $irs; //IRS
        $accout->type = 14;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'tax')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->tax_sum;
        $line++;
        $num = $accout->save();

        $accout = new Transactions();
        $accout->account_id = $pretax; //PRETAX
        $accout->type = 14;
        $accout->num = $num;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'tax')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->tax_sum * -1;
        $line++;
        $accout->save();

        $accout = new Transactions();
        $accout->account_id = $irs; //IRS
        $accout->type = 14;
        $accout->num = $num;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'tax')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->custtax_total;
        $line++;
        $accout->save();

        $accout = new Transactions();
        $accout->account_id = $custtax; //CUSTTAX
        $accout->type = 14;
        $accout->num = $num;
        //$accout->refnum1 = $this->from_date;
        //$accout->refnum2 = $this->to_date;
        $accout->valuedate = $date;
        $accout->details = Yii::t('app', 'tax')." ".$this->from_month."-".$this->to_month."/".$this->year;
        $accout->currency_id = $cur;
        $accout->owner_id = $owner;
        $accout->linenum = $line;
        $accout->sum = $this->custtax_total * -1.0;
        $line++;
        $accout->save();
    }

}
