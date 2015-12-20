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

class FormMprofloss extends Model {

    public $year;

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['to_date', 'from_date', 'year'], 'safe'),
            array(['to_date', 'from_date', 'year'], 'safe', 'on' => 'search'),
        );
    }

    private function calc($account_type) {

        $accounts = Accounts::find()->where(['type' => $account_type])->All();
        $sum = 0;
        $data = array();
        $stime = "00:00:01";
        $etime = "23:59:59";
        $from_date = "$this->year-01-01 $stime";
        $to_date = "$this->year-12-31 $etime";
        foreach ($accounts as $account) {

            $sum = $account->getTotal($from_date, $to_date);
            if ($sum != 0) {
                $accounty = array(
                    'id' => $account->id,
                    'name' => $account->name,
                    'sum' => $sum,
                    'id6111' => $account->id6111
                );

                for ($x = 1; $x <= 12; $x++) {
                    if ($x <= 9)
                        $a = "0$x";
                    else
                        $a = $x;

                    $last = 31;
                    while (!checkdate($x, $last, $this->year)) {
                        $last--;
                    }
                    $accounty[$x] = $account->getTotal("$this->year-$a-01 $stime", "$this->year-$a-$last $etime");
                }

                $data[] = $accounty;
            }
        }
        return $data;
    }

    public function search() {


        $data = $this->calc(3); //incomes
        //$data=array_merge($data,$this->calc(2));//outcomes


        return new \yii\data\ArrayDataProvider(array(
            'allModels' => $data,
            'pagination' => array(
                'pageSize' => 100,
            ),
                )
        );
    }

    //put your code here
}
