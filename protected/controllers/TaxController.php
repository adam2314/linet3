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

use app\models\FormReportVat;
use app\models\FormReportTaxrep;

class TaxController extends RightsController {


    public function actionVat() {
        $model = new FormReportVat();

        if ($model->load(Yii::$app->request->post())&&$model->validate()){
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\bootstrap\ActiveForm::validate($model);
            }
            
            if ($model->step == 1) {
                \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'VAT has been commited'));
                $model->pay();
            }



            $model->calcPay();

            return $this->render('vat_preview', array('model' => $model,));
            Yii::$app->end();
        }


        return $this->render('vat', array('model' => $model));
    }

    public function actionTaxrep() {
        $model = new FormReportTaxrep();

        if ($model->load(Yii::$app->request->post())&&$model->validate()){
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\bootstrap\ActiveForm::validate($model);
            }
            if ($model->step == 1) {
                $model->pay();
               \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'tax has been commited'));
                Yii::$app->end();
            }

            $model->calcPay();
            return $this->render('taxrep_preview', array('model' => $model,));
            Yii::$app->end();
        }

        return $this->render('taxrep', array('model' => $model));
    }


}
