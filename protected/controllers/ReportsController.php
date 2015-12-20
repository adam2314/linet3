<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\controllers;

use Yii;
use app\components\RightsController;
use app\models\Transactions;
use app\models\Accounts;
use app\models\FormProfloss;
use app\models\FormReportAccounts;
use app\models\FormReportBalance;
use app\models\FormMprofloss;
use app\models\FormReportVat;
use app\models\FormReportTaxrep;
use app\models\FormReportInout;
use app\models\stockAction;

class ReportsController extends RightsController {

    /**
     * Declares class-based actions.
     */
    public function actionMprofloss() {
        $model = new FormMprofloss();
        ////$model->unsetAttributes();

        return $this->render('mprofloss', array('model' => $model,));
    }

    public function actionMproflossajax() {
        $model = new FormMprofloss();
        //$trans=new Transactions();
        //$model->unsetAttributes();

        if (isset($_POST['FormMprofloss'])) {

            $model->attributes = $_POST['FormMprofloss'];
            //$trans->attributes=$_POST['FormProfloss'];
        }
        return $this->renderPartial('mproflossajax', array('model' => $model));
    }

    public function actionProfloss() {
        $model = new FormProfloss();
        ////$model->unsetAttributes();
        if (isset($_POST['FormProfloss'])) {
            $model->attributes = $_POST['FormProfloss'];
            return $this->render('proflossajax', array('model' => $model));
        }

        return $this->render('profloss', array('model' => $model,));
    }

    public function actionBalance() {
        $model = new FormReportBalance();
        ////$model->unsetAttributes();

        if (isset($_POST['FormReportBalance'])) {
            $model->attributes = $_POST['FormReportBalance'];
            return $this->render('balanceajax', array('model' => $model));
        }

        return $this->render('balance', array('model' => $model,));
    }

    public function actionBalanceajax() {
        $model = new FormReportBalance();

        //$model->unsetAttributes();
    }

    public function actionStockaction() {
        $model = new stockAction();
        //$model->unsetAttributes();
        $vl = 'stockAction-grid';
        //echo Yii::$app->request->isAjaxRequest;
        //Yii::$app->end();
        if (isset($_POST['stockAction']))
            $model->attributes = $_POST['stockAction'];



        return $this->render('stockAction', array('model' => $model,));
    }

    public function actionStock() {
        $model = new stockAction();
        //$model->unsetAttributes();
        $vl = 'stockAction-grid';
        //echo Yii::$app->request->isAjaxRequest;
        //Yii::$app->end();
        if (isset($_POST['stockAction'])) {
            $model->attributes = $_POST['stockAction'];
            //if (Yii::$app->request->isAjaxRequest || isset($_POST['ajax']) && $_POST['ajax'] === $vl) {
            // Render partial file created in Step 1
            //    return $this->renderPartial('stock', array(
            //        'model' => $model,
            //    ));
            //    Yii::$app->end();
        }



        return $this->render('stock', array('model' => $model,));
    }

    public function actionJournal() {
        $model = new Transactions();
        $model->scenario = 'search';

        $model->load(Yii::$app->request->get());
        //$vl = 'transactions-grid';
        //echo Yii::$app->request->isAjaxRequest;
        //Yii::$app->end();
        //if (isset($_POST['Transactions']))
        //    $model->attributes = $_POST['Transactions'];
        /*
          if (Yii::$app->request->isAjaxRequest || isset($_POST['ajax']) && $_POST['ajax'] === $vl) {


          // Render partial file created in Step 1
          return $this->renderPartial('journal', array(
          'model' => $model,
          ));
          Yii::$app->end();
          } */



        return $this->render('journal', array('model' => $model,));
    }

    public function actionOwe() {
        $model = new \app\models\FormOwe();
        //$model->unsetAttributes();
        //$model->type = 0; //could be dynamic

        return $this->render('owe', array('dataProvider' => $model->find(),));
    }

    public function actionAccounts() {
        $model = new FormReportAccounts();

        if ($model->load(Yii::$app->request->post())) {

            return $this->renderPartial('accountsAjax', array('model' => $model));

            Yii::$app->end();
        }

        return $this->render('accounts', array('model' => $model,));
    }

    public function actionInout() {
        $model = new FormReportInout();

        return $this->render('Inout', array('model' => $model,));
    }

    public function actionInoutajax() {
        $model = new FormReportInout();

        //$model->unsetAttributes();
        if (isset($_POST['FormReportInout'])) {
            $model->attributes = $_POST['FormReportInout'];
        }
        return $this->renderPartial('Inoutajax', array('model' => $model));
    }

}
