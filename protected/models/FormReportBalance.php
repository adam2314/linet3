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

class FormReportBalance extends Model {

    public $year;
    public $from_date;
    public $to_date;

    public function init() {
        parent::init();
        $this->from_date = date('Y') . "-01-01";
        $this->to_date = date('Y-m-d');
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['to_date', 'from_date', 'year'], 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['to_date', 'from_date', 'year'], 'safe', 'on' => 'search'),
        );
    }

    private function calc($account_type) {
        $accounts = Accounts::find()->where(['type' => $account_type])->All();
        $sum = 0;
        $data = array();
        $data[] = array("id" => '', 'name' => Acctype::getName($account_type), 'neg' => '', 'pos' => '', 'sum' => '', 'id6111' => '');
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
        $accType = Acctype::find()->All();
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


        return new \yii\data\ArrayDataProvider(array(
            'allModels' => $data,
            'pagination' => array(
                'pageSize' => 1000,
            ),
                )
        );
    }

    //put your code here
}
