<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class chequeReport extends DashPanel {

    public $logo = 'none';
    public $help = 'none';
    public $collapse = false;
    public $fullscreen = false;

    
    public function sum($cheques, $type, $date_from, $date_to) {
        //$date_from = "01-01-$yaer 00:00:00";
        //$date_to = "31-12-$yaer 23:59:59";

        $criteria = new CDbCriteria;

        $criteria->select = "sum(leadsum) AS lead,a.type,t.valuedate";
        $criteria->join = 'LEFT JOIN `{{accounts}}` `a` ON a.id=t.account_id';
        $criteria->group = "a.type";

        $criteria->addCondition("a.type = :type");
        $criteria->addCondition("t.valuedate>=:date_from");
        $criteria->addCondition("t.valuedate<=:date_to");

        $criteria->params[':date_from'] = $date_from;
        $criteria->params[':date_to'] = $date_to;
        $criteria->params[':type'] = $type;


        return $cheques->commandBuilder->createFindCommand($cheques->getTableSchema(), $criteria)->queryScalar();
    }

    private function reach($type, $yaer) {
        $cheques = new Transactions('search');
        $cheques->unsetAttributes();

        $sums = array();
        for ($x = 1; $x <= 12; $x++) {
            if ($x <= 9)
                $a = "0$x";
            else
                $a = $x;

            $last = 31;
            while (!checkdate($x, $last, date("Y"))) {
                $last--;
            }
            $result = $this->sum($cheques, $type, $yaer . "-$a-01" . " 00:00:00", $yaer . "-$a-$last" . " 23:59:59");
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

    private function search($cheques) {

        $criteria = new CDbCriteria;


        $criteria->compare('type', $cheques->type, true);


        if ($cheques->bank_refnum == null)
            $criteria->addCondition('bank_refnum IS NULL');
        else
            $criteria->compare('bank_refnum', $cheques->bank_refnum);




        $criteria->compare('dep_date', $cheques->dep_date, true);
        $criteria->compare('line', $cheques->line);

        $criteria->compare('refnum', $cheques->refnum, true);
        $criteria->compare('currency_id', $cheques->currency_id, true);
        return new CActiveDataProvider($cheques, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 8),
        ));
    }

    public function init() {





        $this->content = //print_r($this->sum($cheques, 2), true);
                //print_r($this->reach(3,date("Y")), true).//2out,3in
                //print_r(array(15000.00,17040.00,0,0,0,54910.00,121068.00,0,0,0,0,0), true).
                $this->Widget('ext.highcharts.HighchartsWidget', array(
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
