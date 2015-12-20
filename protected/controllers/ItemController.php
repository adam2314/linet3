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
use yii\helpers\ArrayHelper;
use app\components\RightsController;
use app\models\Item;

class ItemController extends RightsController {

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionTemplate() {
        $model = new Item;

        //$cat = Html::listData(Itemcategory::findAll(), 'id', 'name');
        //$units = Html::listData(Itemunit::findAll(), 'id', 'name');
        return $this->render('create', array(
            'model' => $model,
            //'cat' => $cat,
            //'units' => $units,
        ));
    }

    public function actionJson($id = 0) {
        $model = $this->findModel($id);

        //adam: there is a bug with the public property vat in the framework  Issue 1385 (WontFix)
        return \yii\helpers\Json::encode($model);
        //Yii::$app->end(); //*/
    }

    public function actionVatJSON($id = 0) {
        $model = $this->findModel($id);

        //adam: there is a bug with the public property vat in the framework  Issue 1385 (WontFix)
        return json_encode($model);
        //Yii::$app->end(); //*/
    }

    public function actionAutocomplete($term = '') {
        $res = Item::AutoComplete($term);
        return \yii\helpers\Json::encode($res);
        //Yii::$app->end(); //*/
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Item;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(Yii::$app->request->post('ajax')!==null)
                return \app\helpers\Response::send (200,$model);
            //$model->pic->saveAs('/to/localFile');
                return $this->redirect(array('admin', 'id' => $model->id));
        }
        if(Yii::$app->request->post('ajax')!==null)
            return \app\helpers\Response::send (501,$model->errors);
        $model->sku = $model->maxId() + 1;
        
        $model->parent_item_id = 0;
        return $this->render('create', array(
            'model' => $model,
            //'cat' => $cat,
            //'units' => $units,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        // Uncomment the following line if AJAX validation is needed

        //$model->setEavAttributes(array('attribute1' => 'value1', 'attribute2' => 'value2'));

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //$model->attributes = $_POST['Item'];
            //$model->deleteEavAttributes();
            if (isset($_POST['propertiesE']) && isset($_POST['propertiesV'])) {
                $model->properties=array_combine($_POST['propertiesE'], $_POST['propertiesV']); ////saveEavAttributes
                $model->save();
            }

                return $this->redirect(array('view', 'id' => $model->id));
        }

        //$cat = ArrayHelper::toArray(Itemcategory::findAll([]), ['id', 'name']);
        //$units = ArrayHelper::toArray(Itemunit::findAll([]), ['id', 'name']);

        return $this->render('update', array(
            'model' => $model,
            //'cat' => $cat,
            //'units' => $units,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        //if (Yii::$app->request->isPostRequest) {
            
            // we only allow deletion via POST request
            $this->findModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        //} else
        //    throw new \yii\web\HttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Item');
        return $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        
        $model = new Item();

        $model->scenario="search";
        $model->load(Yii::$app->request->get());

        return $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function findModel($id) {
        $model = Item::findOne($id);
        if ($model === null)
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
