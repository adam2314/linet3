<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class TransactionController extends RightsController {

    public function actionView($id = 200) {
        $transactions = new Transactions('search');
        $transactions->unsetAttributes();
        $transactions->num = $id;
        $this->render('index', array('model' => $transactions));
    }

    public function actionCreate() {
        $model = new FormTransaction();
        
        $this->performAjaxValidation($model);
        if (isset($_POST['FormTransaction'])) {
            $model->attributes = $_POST['FormTransaction'];
            if ($model->save())
                Yii::app()->user->setFlash('success', Yii::t('app', 'Transaction saved'));
        }


        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionOpenBalance() {
        $model = new Transactions();

        if (isset($_POST['account'])) {

            $year = $_POST['year'];
            $date = "$year-01-01 00:00:01";
            $accountArr = $_POST['account'];
            $balanceArr = $_POST['bal'];
            foreach ($accountArr as $index => $account) {
                $sum = $balanceArr[$index];
                if ($account) {
                    $submodel = new Transactions();
                    $submodel->valuedate = $date;
                    $submodel->details = Yii::t('app', "Opening Balance");
                    $submodel->type = Yii::app()->user->settings['transactionType.openBalance'];
                    $submodel->currency_id = Yii::app()->user->settings['company.cur'];
                    $submodel->account_id = $account;
                    $submodel->sum = $sum;

                    $submodel->owner_id = Yii::app()->user->id;
                    $submodel->linenum = 1;
                    $submodel->save();
                    //$submodel->num;


                    $submodel1 = new Transactions();
                    $submodel1->num = $submodel->num;
                    $submodel1->valuedate = $date;
                    $submodel1->details = Yii::t('app', "Opening Balance");
                    $submodel1->type = Yii::app()->user->settings['transactionType.openBalance'];
                    $submodel1->currency_id = Yii::app()->user->settings['company.cur'];
                    $submodel1->account_id = Yii::app()->user->settings['company.acc.openbalance'];
                    $submodel1->sum = $sum * -1.0;

                    $submodel1->owner_id = Yii::app()->user->id;
                    $submodel1->linenum = 2;
                    $submodel1->save();
                }
            }


            Yii::app()->user->setFlash('success', Yii::t('app', 'Open Balance saved'));
            //$this->redirect(array('OpenBalance'));
        }

        $this->render('opbalance', array(
            'model' => $model,
        ));
    }
    
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'transaction-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
