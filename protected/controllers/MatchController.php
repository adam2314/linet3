<?php

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class MatchController extends RightsController {

    public function actionIntmatch() {
        $model = new FormIntmatch();


        if (isset($_POST['FormIntmatch'])) {
            //$extmatch->attributes=$_POST['FormExtmatch'];
            //if(){
            //$this->performAjaxValidation($extmatch);
            $model->in = $_POST['FormIntmatch']['In']['match'];
            $model->out = $_POST['FormIntmatch']['Out']['match'];
            $model->account_id = $_POST['FormIntmatch']['account_id'];
            $model->save();
            Yii::app()->user->setFlash('success', Yii::t('app', 'Mach 1 Success'));
            //}
            //Yii::app()->user->setFlash('success', Yii::t('app','Mach2 Success'));
        }

        $this->render('intmatch', array(
            'model' => $model,
        ));
    }

    protected function inDataColumn($data, $row) {
        // ... generate the output for the column
        // Params:
        // $data ... the current row data   
        // $row ... the row index    
        $this->renderPartial('_trans', array('cdata' => $data,'intType'=>1));
    }

    protected function outDataColumn($data, $row) {
        // ... generate the output for the column
        // Params:
        // $data ... the current row data   
        // $row ... the row index    
        $this->renderPartial('_trans', array('cdata' => $data,'intType'=>0));
    }

    public function actionDispmatch() {

        $match = new IntCorrelation('search');
        if (isset($_POST['FormExtmatch'])) {
            $match->attributes = $_POST['FormExtmatch'];
        }
        $this->render('admin', array(
            'model' => $match,
        ));
    }

    public function actionIntmatchajax() {

        $in = new Transactions('search');
        $out = new Transactions('search');



        $in->unsetAttributes();
        $out->unsetAttributes();

        if (isset($_POST['FormIntmatch'])) {
            $in->attributes = $_POST['FormIntmatch'];
            $out->attributes = $_POST['FormIntmatch'];
        }
        $this->renderPartial('intmatchajax', array('in' => $in, 'out' => $out));
    }
    
    
    public function actionMatchDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = IntCorrelation::model()->findByPk($id);
            if ($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');

            $model->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
    
    

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'intmatch-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
