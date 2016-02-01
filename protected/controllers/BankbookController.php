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
use app\models\Bankbook;
use app\models\Transactions;
use app\models\FormExtmatch;
use app\models\ExtCorrelation;

class BankbookController extends RightsController {

    public function actionView($id) {
        return $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Bankbook;

        if ($model->load(Yii::$app->request->post())){
            if ($model->save())
                $this->redirect(array('bankbook/admin/'. $model->account_id));
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

        if ($model->load(Yii::$app->request->post())){
            if ($model->save())
                $this->redirect(array('bankbook/admin/'. $model->account_id));
        }

        return $this->render('update', array(
            'model' => $model,
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
            $model=$this->loadModel($id);
            $account_id=$model->account_id;
                    $model->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin/'.$account_id));
        } else
            throw new \yii\web\HttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionAdmin($id=null) {
        $model = new Bankbook();
        //$model->unsetAttributes();  // clear any default values
        if($id!==null)
            $model->account_id=$id;
        if (isset($_POST['Bankbook']['file'])) {

            $model->import((int) $_POST['Bankbook']['account_id']);
            //Yii::$app->end();
        }

        return $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAjax() {
        $model = new Bankbook();
        //$model->unsetAttributes();
        //$model->account_id=$account_id;
        if (isset($_POST['Bankbook'])) {
            $model->attributes = $_POST['Bankbook'];
        }
        return $this->renderPartial('ajax', array('model' => $model,));
    }

    public function actionEdispmatch() {
        $match = new ExtCorrelation();
        if (isset($_POST['FormExtmatch'])) {
            $match->attributes = $_POST['FormExtmatch'];
        }
        return $this->render('disp', array(
            'model' => $match,
        ));
    }

    public function actionExtmatch() {
        $extmatch = new FormExtmatch();
        $model = new Bankbook();

        if ($extmatch->load(Yii::$app->request->post())){

            $extmatch->save();
            \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Mach 1 Success'));
            //}
            //\Yii::$app->getSession()->setFlash('success', Yii::t('app','Mach2 Success'));
        }

        return $this->render('extmatch', array(
            'model' => $model, 'extmatch' => $extmatch,
        ));
    }

    protected function bankDataColumn($data, $row) {
        // ... generate the output for the column
        // Params:
        // $data ... the current row data   
        // $row ... the row index    
        return $this->renderPartial('_bank', array('cdata' => $data));
    }

    protected function transDataColumn($data, $row) {
        // ... generate the output for the column
        // Params:
        // $data ... the current row data   
        // $row ... the row index    
        return $this->renderPartial('_trans', array('cdata' => $data));
    }

    public function actionMatchdelete($id) {

        $model = ExtCorrelation::findOne($id);
        if ($model === null)
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');

        $model->delete();

        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('edispmatch'));
    }

    public function actionExtmatchajax() {

        $model = new Bankbook();
        $trans = new Transactions();
        $model->scenario='search';
        $trans->scenario='search';


        //$model->unsetAttributes();
        //$trans->unsetAttributes();
        //$model->account_id=$account_id;
        if (isset($_POST['FormExtmatch'])) {
            $model->attributes = $_POST['FormExtmatch'];
            $trans->attributes = $_POST['FormExtmatch'];
        }

        $model->extCorrelation = 0;
        $trans->extCorrelation = 0;
        return $this->renderPartial('extmatchajax', array('model' => $model, 'trans' => $trans));
    }


    public function loadModel($id) {
        $model = Bankbook::findOne($id);
        if ($model === null)
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
