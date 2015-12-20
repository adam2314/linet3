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
use app\models\FormDeposit;
use app\models\Doccheques;

class DepositController extends RightsController {

    public function actionAdmin() {
        $model = new FormDeposit;
        $model->load(Yii::$app->request->post());

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($model);
        }

        ////$model->unsetAttributes();  // clear any default values
        if ($model->validate()) {
            if ($model->save())
                \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Deposit Success'));
            //else
            //        return Yii::$app->response->send(200,$model->errors);
        }
        $cheques = new Doccheques();
        //$cheques->unsetAttributes();
        //$cheques->bank_refnum='';


        return $this->render('admin', array(
                    'model' => $model,
                    'cheques' => $cheques,
        ));
    }

}
