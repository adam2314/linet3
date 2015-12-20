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

class FormReportInout extends Model {

    public $year;
    public $from_date;
    public $to_date;

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['to_date', 'from_date', 'year'], 'safe'),
            array(['to_date', 'from_date', 'year'], 'safe', 'on' => 'search'),
        );
    }

    private function calc($accounts = array(), $types = array()) {
        $sum = 0;

/*
        $criteria = new CDbCriteria;
        $criteria->condition = "date BETWEEN :from_date AND :to_date";
        $criteria->params = array(
            ':from_date' => $from_date,
            ':to_date' => $to_date,
        );
        $criteria->compare('type', $types);
        $criteria->compare('account_id', $accounts);
*/

        $trans = Transactions::find()->where(['BETWEEN', 'valuedate', $this->from_date, $this->to_date])->andWhere(['type' => $types, 'account_id' => $accounts])->All();
        $sum = 0;
        $data = array();
        foreach ($trans as $tran) {

            $sum = $tran->sum;
            if ($sum != 0)
                $data[] = array('id' => $tran->id, 'name' => $tran->account_id, 'sum' => $sum, 'id6111' => $tran->id);
        }
        return $data;
    }

    public function search() {
        //search
        //find all relvent transctions by type aginst income accounts
        //types:$RelevantTypes = array(INVOICE, SUPINV, MANINVOICE,INVRCPT,DOCPROFORMA);
        //($type == MANINVOICE) || ($type == INVOICE) || ($type == INVRCPT)||($type == DOCPROFORMA)||($type == SUPINV)
        $types = array(0,1,2
                /*
                  0 Manual
                  1Invoice
                  2Supplier Invoicve
                  3Receipt
                  4CHEQUEDEPOSIT
                  5Supplier Payment
                  6vat
                  7STORENO
                  8BANKMATCH
                  9SRCTAX
                  10PATTERN
                  11MANINVOICE
                  12MANRECEIPT
                  14TRAN_PRETAX
                  15TRAN_SALARY
                  16OPBALANCE
                  17RETURNINV
                  18INVRCPT
                  19DOCREDIT
                  20DOCPROFORMA
                  21DELIVERY

                 */
        );
        $accounts = array(0,1,2);
        $data = $this->calc($accounts, $types); //incomes
        //find all relvent transctions by type aginst outcome accounts
        //(($actype == OUTCOME) || ($actype == OBLIGATIONS)||($actype==ASSETS))
        $types = array(0,1,2);
        $accounts = array(0,1,2);

        $data = array_merge($data, $this->calc($accounts, $types)); //outcomes


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
