<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormProfloss
 *
 * @author adam
 */
class FormMprofloss extends CFormModel {

    public $year;

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
        $stime = "00:00:01";
        $etime = "23:59:59";
        $from_date = "01/01/$this->year $stime";
        $to_date = "31/12/$this->year $etime";

        $sumline = array("id" => '', "name" => Yii::t("app", "Total"));
        $total = 0;
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
                    $accounty[$x] = $account->getTotal("01/$a/$this->year $stime", "$last/$a/$this->year $etime");

                    if (isset($sumline[$x]))
                        $sumline[$x]+=$accounty[$x];
                    else
                        $sumline[$x] = $accounty[$x];
                }
                $total+=$sum;
                $data[] = $accounty;
            }
        }
        $sumline["sum"] = $total;
        $data[] = $sumline;
        return $data;
    }

    public function search() {


        $data = $this->calc(3); //incomes
        $data[] =$inTotal = array_pop($data);
        $data = array_merge($data, $this->calc(2)); //outcomes
        $data[] =$outTotal = array_pop($data);



        $sum = 0;
        $total = array(
            'id' => '',
            'name' => Yii::t("app", "Profit & Loss"),
            'sum' => '',
            'id6111' => ''
        );

        for ($x = 1; $x <= 12; $x++) {
            $total[$x] = $inTotal[$x] + $outTotal[$x];
            $sum+=$total[$x];
        }
        $total['sum'] = $sum;

        $data[] = $total; //total
        //print_r($total);

        return new CArrayDataProvider($data, array(
            'pagination' => array(
                'pageSize' => 100,
            ),
                )
        );
    }

    //put your code here
}
