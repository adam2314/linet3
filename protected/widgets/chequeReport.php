<?php
/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
namespace app\widgets;
use Yii;
use app\widgets\DashPanel;

class chequeReport extends DashPanel {

    public $logo = 'none';
    public $help = 'none';
    public $collapse = false;
    public $fullscreen = false;
    public $height = 450;   
    public function sum($type, $date_from, $date_to) {
        //$date_from = "01-01-$yaer 00:00:00";
        //$date_to = "31-12-$yaer 23:59:59";

        $query = new \yii\db\Query;

        $query->select("sum(`leadsum`) AS lead,{{%transactions}}.type,{{%transactions}}.valuedate")->from('{{%transactions}}');
        $query->join = [['LEFT JOIN', '{{%accounts}}', '{{%accounts}}.id=account_id']];
        $query->groupBy = "{{%accounts}}.type";

        $query->where("{{%accounts}}.type = :type");
        $query->andWhere("valuedate>=:date_from");
        $query->andWhere("valuedate<=:date_to");

        $query->params([':date_from'=>$date_from,':date_to' => $date_to,':type' => $type]);


        $command = $query->createCommand();
        return  $command->queryScalar();
    }

    private function reach($type, $yaer) {
        //$cheques = new Transactions('search');
        //$cheques->unsetAttributes();

        $sums = array();
        for ($x = 1; $x <= 12; $x++) {
            if ($x <= 9)
                $a = "0$x";
            else
                $a = $x;

            $last=  \app\helpers\Linet3Helper::lastDay($x,date("Y"));
            $result = $this->sum( $type, $yaer . "-$a-01" . " 00:00:00", $yaer . "-$a-$last" . " 23:59:59");
            if ($result == 0) {
                array_push($sums, "0");
            } else {
                if ($type == 2)
                    $result = $result * -1;
                array_push($sums, round($result));
            }
        }
        return $sums;
    }


    public function init() {





        $this->content = //print_r($this->sum($cheques, 2), true);
                //print_r($this->reach(3,date("Y")), true).//2out,3in
                //print_r(array(15000.00,17040.00,0,0,0,54910.00,121068.00,0,0,0,0,0), true).
                \miloschuman\highcharts\Highcharts::Widget(array(
            'options' => array(
                'credits' => array('enabled' => false),
                'title' => array('text' => ''),
                'xAxis' => array(
                    'categories' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12)
                ),
                'yAxis' => array(
                    'title' => array('text' => '')
                ),
                'legend' => array('layout' => 'vertical',
                    'rtl' => true,
                    'symbolPadding' => '-25',
                ),
                'series' => array(
                    array('name' => Yii::t('app', 'Income'), 'data' => $this->reach(3, date("Y"))), //3
                    array('name' => Yii::t('app', 'Income-Last Year'), 'data' => $this->reach(3, date("Y") - 1)), //3
                    array('name' => Yii::t('app', 'Expenses'), 'data' => $this->reach(2, date("Y"))), //2
                    array('name' => Yii::t('app', 'Expenses-Last Year'), 'data' => $this->reach(2, date("Y") - 1))//2
                ),
                'tooltip'=>[
                    'useHTML'=> true
                ],
                'chart' => array(
                    //'plotBackgroundColor' => '#ffffff',
                    //'plotBorderWidth' => null,
                    //'plotShadow' => false,
                    //'height' => 400,
                    'type' => 'column'
                ),
            )
                ), true);
        //parent::init();
    }

}
