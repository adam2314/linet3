<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class FormReportBalance extends CFormModel {

    public $year;
    public $from_date;
    public $to_date;

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('to_date, from_date, year', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('to_date, from_date, year', 'safe', 'on' => 'search'),
        );
    }

    private function calc($account_type) {
        $criteria = new CDbCriteria;
        $criteria->condition = "type = :type";
        $criteria->params = array(
            ':type' => $account_type,
        );

        $accounts = Accounts::model()->findAll($criteria);
        $sum = 0;
        $data = array();
        $data[] = array("id" => '', 'name' => Acctype::model()->getName($account_type), 'neg' => '', 'pos' => '', 'sum' => '', 'id6111' => '');
        $total = array("id" => '', 'name' => Yii::t("app", "Total"), 'neg' => 0, 'pos' => 0, 'sum' => 0, 'id6111' => '');
        foreach ($accounts as $account) {
            //echo $this->from_date.":00<br>";
            $sum = $account->getTotal($this->from_date . ":00", $this->to_date . ":00");
            $neg = $account->getNeg($this->from_date . ":00", $this->to_date . ":00");
            $pos = $account->getPos($this->from_date . ":00", $this->to_date . ":00");
            $total['sum']+=$sum;
            $total['neg']+=$neg;
            $total['pos']+=$pos;

            if (($sum != 0) || ($neg != 0) || ($pos != 0))
                $data[] = array('id' => $account->id, 'name' => $account->name, 'neg' => $neg, 'pos' => $pos, 'sum' => $sum, 'id6111' => $account->id6111);
        }
        $data[] = $total;
        return $data;
    }

    public function search() {


        //$data=$this->calc(3);//incomes
        $accType = Acctype::model()->findAll();
        $data = array();
        $sum = array("id" => '', 'name' => Yii::t("app", "Sub Total"), 'neg' => 0, 'pos' => 0, 'sum' => 0, 'id6111' => '');
        foreach ($accType as $type) {
            //echo $type->id;
            $data = array_merge($data, $this->calc($type->id));
            $data[] = $tmp = array_pop($data);
            $sum['sum']+=$tmp["sum"];
            $sum['neg']+=$tmp["neg"];
            $sum['pos']+=$tmp["pos"];
        }

        $data[] = $sum;


        return new CArrayDataProvider($data, array(
            'pagination' => array(
                'pageSize' => 1000,
            ),
                )
        );
    }

    //put your code here
}
