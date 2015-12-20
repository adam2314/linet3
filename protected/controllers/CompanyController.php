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
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\components\RightsController;
use app\models\Company;
use app\models\DatabasesPerm;
class CompanyController extends RightsController {// //RightsController

    public $defaultAction = 'index';
    public $layout = 'clean';

    public function init() {
        if (Yii::$app->params['newInstall']) {
            $this->redirect('install');
            Yii::$app->end();
            //}
        }
        return parent::init();
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionIndex() {
        $this->layout = 'clean';
        //$this->layout='main';
        //echo \yii\helpers\Json::encode("ok");
        //Yii::$app->end();

        if (isset($_POST['Company'])) {
            $id = (int) $_POST['Company'];

            //
            //if has access
            //$database= Company::findOne($id);
            Yii::info($id);
            //Yii::$app->user->setState('Database',$database );
            //Yii::$app->user->setState('Company',$id);
            //echo 'ok';

            //Company::select($id);
            Yii::$app->session['company']=$id;

            //redirect
            return \app\helpers\Response::send(200,$id);
        }
        if ($this->company != 0) {
            Yii::$app->session['company']= 0;
            //unset(Yii::$app->session['company']);
            return $this->redirect(\yii\helpers\BaseUrl::base().'/company/index');
            \Yii::$app->end();
        }
        
        
        
        $model = new Company;
        ////$model->unsetAttributes();  // clear any default values
        return $this->render('index', array('model' => $model,));
    }

    public function actionAdmin() {//only admin
        if (isset($_POST['Company'])) {
            //if has access
            $database = Company::findByPk((int) $_POST['Company']);
            Yii::info((int) $_POST['Company']);
            //Yii::$app->user->setState('Database', $database);
            $this->company= $database->id;
            //redirect

            Yii::$app->end();
        }

        if ($this->company != 0) {
            $this->company=0;
            //Yii::$app->user->Company=0;
            //$this->redirect('company');
            //Yii::$app->end();
        }

        $model = new Company();
        //$model->unsetAttributes();  // clear any default values
        return $this->render('admin', array('model' => $model,));
    }

    public function actionDelete($id) {//only admin
        //if (Yii::$app->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = $this->loadModel($id);
            
            $model->delete();
            $this->company=0;
            $this->redirect(\yii\helpers\BaseUrl::base().'/company/admin');
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            //if(!isset($_GET['ajax']))
            //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        //} else {
        //    throw new \yii\web\HttpException(400, 'Invalid request. Please do not repeat this request again.');
        //}
    }

    public function actionCreate() {//only admin
        $model = new Company;
        $model->string = Yii::$app->dbMain->dsn;
        $model->user = Yii::$app->dbMain->username;
        $model->password = Yii::$app->dbMain->password;
        //$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //$model->prefix=substr(str_shuffle($chars),0,4)."_";


        if ($model->save()) {
            $database = Company::findOne($model->id);
            Yii::$app->session['company']=$model->id;
            //redierct to settings.
            $this->redirect(array('settings/admin'));
        }

        return $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionDeletepermission($id) {//only admin
        $model = DatabasesPerm::findOne($id);
        if ($model === null) {
            
        } else {
            $database_id = $model->database_id;
            $model->delete();
            $this->redirect(array('company/permissions/id/' . $database_id));
        }
    }

    public function actionPermissions($id) {
        //$model=  DatabasesPerm::findOne($id);
        $model = new DatabasesPerm();
        $model->scenario='search';
        //$model->unsetAttributes();  // clear any default values
        $model->database_id = $id;
        $user = new DatabasesPerm;
        $user->database_id = $id;
        if ($user->load(Yii::$app->request->post())){
            $user->save();
            //if($model->save())
            //    $this->redirect(array('index'));
        }

        return $this->render('permissions', array(
            'model' => $model,
            'user' => $user,
        ));
    }

    public function actionUpdate($id) {//only admin
        $model = $this->loadModel($id);

        if ($model->load(Yii::$app->request->post())){
            if ($model->save())
                $this->redirect(array('index'));
        }

        return $this->render('update', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Company::findOne($id);
        if ($model === null)
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function accessDenied($message = null) {
        Yii::$app->user->setState('Company', 0);

        if ($message === null) {
            $message = Rights::t('app', 'User is not asigned a role inside the company!');
        }

        return parent::accessDenied($message);
    }

}
