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

class FormProfloss extends Model {

    public $year;
    public $from_date;
    public $to_date;

    public function init() {
        parent::init();
        $this->from_date = date('Y') . "-01-01";
        $this->to_date = date('Y-m-d');
    }

    public function attributeLabels() {
        return array(
            'year' => Yii::t('app', 'Year'),
            'from_date' => Yii::t('app', 'From Date'),
            'to_date' => Yii::t('app', 'To Date'),
        );
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

        $accounts = Accounts::find()->where(['type' => $account_type,])->All();
        $sum = 0;
        $data = array();
        foreach ($accounts as $account) {

            $line = $account->getTotal($this->from_date . " 00:00:00", $this->to_date . " 23:59:59");
            if ($line != 0) {
                $data[] = array('id' => $account->id, 'name' => $account->name, 'sum' => $line, 'id6111' => $account->id6111);
                $sum+=$line;
            }
        }
        $data[] = array('id' => '', 'name' => Yii::t('app', 'Total'), 'sum' => $sum, 'id6111' => '');
        return $data;
    }

    public function search() {


        $data = $this->calc(3); //incomes
        $data[] = $inTotal = array_pop($data);
        $data = array_merge($data, $this->calc(2)); //outcomes
        $data[] = $outTotal = array_pop($data);


        $data[] = array('id' => '', 'name' => Yii::t("app", "Profit & Loss"), 'sum' => $inTotal["sum"] + $outTotal["sum"], 'id6111' => '');
        return new \yii\data\ArrayDataProvider(
                array(
            'allModels' => $data,
            'pagination' => array(
                'pageSize' => 100,
            ),
                )
        );
    }

    //put your code here
}
