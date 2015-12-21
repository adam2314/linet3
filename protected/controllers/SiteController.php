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
use yii\filters\AccessControl;
use app\components\LitController;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\FormLogin;


//use app\models\ContactForm;

class SiteController extends LitController {

    public $layout = 'single';

    public function beforeAction($action) {
        if ($action->id == 'login' && isset($_POST['FormLogin']['hash']) && isset($_POST['FormLogin']['id'])) {
            Yii::$app->controller->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    
    public function actionError() {
        //var_dump (Yii::$app->errorHandler->exception);
        //exit;
        $this->layout = 'single';
        if (isset(Yii::$app->errorHandler->error)&&($error = Yii::$app->errorHandler->error)) {
            if (strpos(Yii::$app->request->url,'api')!=true) {

                //if (Yii::$app->request->isAjaxRequest)
                //    return $error['message'];
                //else
                    return $this->render('error',['error'=>  $error]);
            }else {
                return \app\helpers\Response::send($error->statusCode, $error->getMessage());
            }
        } elseif (isset(Yii::$app->errorHandler->exception)&&($exception = Yii::$app->errorHandler->exception)) {
            if (strpos(Yii::$app->request->url,'api')!=true) {

                //if (Yii::$app->request->isAjaxRequest)
                //    return $exception['message'];
                //else
                    return $this->render('error',['error'=>  $exception]);
            }else {
                return \app\helpers\Response::send($exception->statusCode, $exception->getMessage());
            }
        } else {

            //if ($error = Yii::$app->errorHandler->error)

            return \app\helpers\Response::send(500, 'Unknown error');
        }
    }

//*/

    /**
     * Displays the contact page
     */
    public function actionSupport() {
        return $this->redirect("http://www.linet.org.il/support/paid-support");
        //Yii::$app->end();
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = 'clean';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new FormLogin();

        if (isset($_POST['FormLogin']['hash']) && isset($_POST['FormLogin']['id'])) {
            $model->scenario = 'api';
            if ($model->load(Yii::$app->request->post()) && $model->apiLogin()) {
                return $this->redirect(\yii\helpers\BaseUrl::base() . "/company/index/");
            }
        }


        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(\yii\helpers\BaseUrl::base() . "/company/index/");
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionBug() {
        //$this->layout = '//layouts/main';
        return $this->redirect(\yii\helpers\BaseUrl::base() . "/settings/bug");
        
    }

    public function actionAbout() {
        $this->layout = 'single';
        $model = new \app\models\Update;
        return $this->render('pages/about', array('version' => $model->getSVersion()
        ));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        //Yii::$app->user->setState('Company', 0);
        Yii::$app->user->logout();
        return $this->redirect(Yii::$app->homeUrl);
    }

    public function actionDownload($id) {
        $model = \app\models\Download::findOne(['id'=>$id]);
        if ($model == null){
            
        }else{
            //throw new \yii\web\HttpException(404, 'The requested page does not exist.');

            $comp = \app\models\Company::findOne($model->company_id);
            $comp->select($model->company_id);

            $id = (int) $model->file_id;
            $model = \app\models\Files::findOne($id);
            if ($model === null) {
                throw new \yii\web\HttpException(404, 'The requested page does not exist.');
            }
            $file = $model->getFullPath() . $model->id;
            return Yii::$app->getResponse()->sendFile($file, $model->name);
        }
    }

}
