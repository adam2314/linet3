<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class LogController extends RightsController {

    public $defaultAction = 'admin';

    public function actionAdmin() {
        $model = new Log('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Log']))
            $model->attributes = $_GET['Log'];


        $this->render('admin', array('model' => $model,));
    }

    public function actionDelete($id) {//only admin
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModel($id);

            $model->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function actionView($id) {//only admin
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);



        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Log::model()->findByPk($id);

        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        // if(!$model->hasAccess(Yii::app()->user->id))
        //    throw new CHttpException(403,'Access Denaid');

        return $model;
    }

}
