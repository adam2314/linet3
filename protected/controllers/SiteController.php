<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class SiteController extends Controller {

    
    
    
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layout = '//layouts/clean';
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionSupport() {
        $this->redirect("http://www.linet.org.il/support/paid-support");
        Yii::app()->end();
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {

        if(User::model()->findAll()==null){
            $this->redirect(Yii::app()->createAbsoluteUrl('install/user'));
                Yii::app()->end();
        }
        
        
        $model = new FormLogin;
        $this->layout = '//layouts/clean';
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['FormLogin'])) {
            $model->attributes = $_POST['FormLogin'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        
        if (isset($_POST['login_id'])) {
            $model->id = $_POST['login_id'];
            $model->hash = $_POST['login_hash'];
            //$model->login_company = $_POST['login_company'];
            // validate user input and redirect to the previous page if valid
            if ($model->apiLogin())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionBug() {
        //$this->layout = '//layouts/clean';

        $model = new Bug();
        $dataProvider = new CActiveDataProvider('Bug');
        if (isset($_POST['Bug'])) {
            $model->attributes = $_POST['Bug'];

            $url = $model->send();
            //$this->redirect();
        }

        $this->render('bug', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAbout() {
        //$this->layout = '//layouts/clean';
        $model=new Update;
        $this->render('pages/about', array('version'=>$model->getSVersion()
        ));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->setState('Company', 0);
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionDownload($id) {
        $model=Download::model()->findByPk($id);
        if($model==null)
            throw new CHttpException(404, 'The requested page does not exist.');
        
        $comp=  Company::model()->findByPk($model->company_id);
        $comp->select($model->company_id);
        
        $id = (int) $model->file_id;
        $model = Files::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $file = $model->getFullPath() . $model->id; 
        return Yii::app()->getRequest()->sendFile($model->name, file_get_contents($file));
    }

}
