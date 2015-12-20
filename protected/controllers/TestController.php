<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use app\components\RightsController;

use app\models\FormTest;

class TestController extends RightsController {

    public function actionTest() {
        $model = new FormTest();

        if ($model->load(Yii::$app->request->post())){
            if ($model->docs == 1) {
                $model->docsTest();
            }
            if ($model->transactions == 1) {
                $model->transTest();
            }

            return $this->renderPartial('test_result', array('model' => $model,));
        }


        return $this->render('test', array('model' => $model));
    }


}