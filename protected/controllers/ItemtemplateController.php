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
use app\components\RightsController;
use app\models\ItemTemplate;
class ItemtemplateController extends RightsController {

    public function actionSaveSub($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ItemTemplateItem'])) {
            $submodel = new ItemTemplateItem;
            $submodel->attributes = $_POST['ItemTemplateItem'];
            if ($submodel->save())
                $this->redirect(array('update', 'id' => $model->id));
        }

        $this->redirect(array('update', 'id' => $model->id));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = ItemTemplate::findOne($id);

        $items = ItemTemplateItem::model(); //->search(array('AccTemplate_id'=>$id));
        $items->ItemTemplate_id = $model->id;
        return $this->render('update', array(
            'model' => $model,
            'items' => $items,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new ItemTemplate;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ItemTemplate'])) {
            $model->attributes = $_POST['ItemTemplate'];
            if ($model->save())
                $this->redirect(array('update', 'id' => $model->id));
        }

        return $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $items = ItemTemplateItem::model(); //->search(array('AccTemplate_id'=>$id));
        $items->ItemTemplate_id = $model->id;
        if (isset($_POST['ItemTemplate'])) {
            $model->attributes = $_POST['ItemTemplate'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        return $this->render('update', array(
            'model' => $model,
            'items' => $items,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::$app->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new \yii\web\HttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ItemTemplate');
        return $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ItemTemplate();
        //$model->unsetAttributes();  // clear any default values
        if (isset($_GET['ItemTemplate']))
            $model->attributes = $_GET['ItemTemplate'];

        return $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = ItemTemplate::findOne($id);
        if ($model === null)
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');
        return $model;
    }


}
