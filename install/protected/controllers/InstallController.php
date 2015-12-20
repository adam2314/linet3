<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\controllers;

use Yii;
use app\components\LitController;
use yii\web\Controller;
use app\models\InstallPre;
use app\models\InstallConfig;
use app\models\User;
use app\models\Finish;

class InstallController extends Controller {

    //public $layout = '//layouts/main';

    public function actionIndex($step = 0) {
        //exit;
        //print_r(Yii::$app->dbMain);
        //Yii::$app->user->setState('Install', 1);



        $model = new InstallPre();


        if ($model->load(Yii::$app->request->post())) {
            //$model1 = new InstallPre();

            return $this->redirect('?r=install/config');
            //return $this->renderPartial('Pre', array('model' => $model1));
        }


        //if ($step == 0) {//pre

        return $this->render('Pre', array('model' => $model));
        //}
        //*/
    }

    public function actionError() {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
        return $this->render('error', ["exception" => $exception]);
    }

    public function actionConfig() {

        $model = new InstallConfig();


        //$model->dbtype = 'mysql';
        $model->dbname = 'linet';
        $model->dbuser = 'root';
        $model->dbpassword = 'linet';
        $model->dbhost = 'localhost';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->make()) {
                return $this->redirect('?r=install/user');
            }
        }

        return $this->render('config', array('model' => $model));
    }

    public function actionUser() {
        //make a db con or go back
        $db = new InstallConfig;

        try {
            $db->con();
        } catch (\yii\db\Exception $e) {

            return $this->render('config', array('model' => $db, "error" => "No DB"));
        }



        if (!User::find()->All() == null) {
            return $this->redirect('?r=install/finish');
            //Yii::$app->end();
        }


        //user
        $model = new User();
        $model->scenario = 'create';
        $model->language = 'he_il';
        $model->timezone = 'Asia/Jerusalem';


        if ($model->load(Yii::$app->request->post())) {
            //$model->save();

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\bootstrap\ActiveForm::validate($model);
            }

            if ($model->save()) {
                $this->redirect('?r=install/finish');
            }
        }




        return $this->render('user', array('model' => $model));
    }

    public function actionFinish() {

        $db = new InstallConfig;

        try {
            $db->con();
        } catch (\yii\db\Exception $e) {

            $this->redirect('?r=install/config');
        }

        if (User::find()->All() === null) {
            return $this->redirect('?r=install/user');
        }


        $model = new Finish();


        if ($model->load(Yii::$app->request->post())) {
            //$model->save();
            if ($model->make()) {
                return $this->redirect('../');
            }
        }




        return $this->render('finish', array('model' => $model));
        //redierct
    }

}
