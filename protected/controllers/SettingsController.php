<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\components\RightsController;
use app\models\Settings;
use app\models\Company;
use app\models\Update;
use app\models\User;
use app\models\Bug;
class SettingsController extends RightsController {

    public function actionDashboard() {
        
        $user = User::findOne(Yii::$app->user->id);

        if (isset($_POST['Widget'])) {
            $user = User::findOne(Yii::$app->user->id);
            $user->saveWidget($_POST['Widget']);

            Yii::$app->end();
        }
        
        
        
        $messages = [];
        if (Yii::$app->params['local']) {
            $update = new Update;
            $messages = $update->getMessages(); //[];
        }

        foreach ($messages as $message) {
            \Yii::$app->getSession()->setFlash(
                    'error', "<h3>" . $message["title"] . "</h3><br>" . $message["data"]
            );
        }

        

        return $this->render('dashboard', array(
                    'user' => $user
        ));
    }
    
/*
    public function actionAdminNew() {
        $model = new FormSettings;
        $model->loadAttributes();

        if (isset($_POST['FormSettings'])) {
            $model->attributes = $_POST['FormSettings'];
            if ($model->validate() && $model->save()) {
                //success code here, with redirect etc..
            }
        }
        return $this->render('view', array('model' => $model));
    }*/

    public function actionAdmin() {/* used in the refnum selection */

        if (isset($_POST['Settings'])) {
            if(isset($_POST['ajax'])){
                $model=new Settings;
                return $model->Tmvalidate($_POST['Settings']);
            }
            //$this->performAjaxValidation($_POST['Settings']);
            foreach ($_POST['Settings'] as $key => $value) {
                $model = Settings::findOne($key);
                $model->value = $value['value'];

                //will stop


                $model->save();
            }


            //$comp = Company::findOne($this->company);
            //$comp->loadSettings();
            \Yii::$app->getSession()->setFlash('success', Yii::t("app","Saved"));
            
        }
        $models = Settings::find()->where(array("hidden"=>"0"))->all();//->addOrderBy(['priority'=>'desc'])
        return $this->render('view', array(
            'models' => $models,
        ));
    }
    
    
    public function actionBug() {
        //$this->layout = '//layouts/main';

        $model = new Bug();
        $dataProvider = $model->search([]);
        if (isset($_POST['Bug'])) {
            $model->attributes = $_POST['Bug'];

            $url = $model->send();
            //$this->redirect();
        }

        return $this->render('bug', array(
                    'model' => $model,
                    'dataProvider' => $dataProvider,
        ));
    }
    public function actionAbout() {
        $model = new \app\models\Update;
        return $this->render('about', ['version' => $model->getSVersion()]);
    }


}
