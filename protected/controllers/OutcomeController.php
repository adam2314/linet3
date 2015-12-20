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
use app\models\FormOutcome;
use app\models\Accounts;

class OutcomeController extends RightsController {

    public function actionCreate($type = 0) {
        $model = new FormOutcome();


        if ($type == 1) {
            $model->account_id = \app\helpers\Linet3Helper::getSetting("company.acc.payvat");

            $model->sum = Accounts::findOne($model->account_id)->getBalance();
        }
        if ($type == 2) {
            $model->account_id = \app\helpers\Linet3Helper::getSetting("company.acc.natinspay");
            $model->sum = Accounts::findOne($model->account_id)->getBalance();
        }
        if ($type == 3) {
            $model->account_id = \app\helpers\Linet3Helper::getSetting("company.acc.pretax");
            $model->sum = Accounts::findOne($model->account_id)->getBalance();
        }

        // Uncomment the following line if AJAX validation is needed
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }



        if ($model->load(Yii::$app->request->post())) {

            if ($model->transaction())
                \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'transaction Success'));
        }

        return $this->render('create', array(
                    'model' => $model,
        ));
    }

}
