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
use app\components\RightsController;
use app\models\FormIntmatch;
use app\models\IntCorrelation;
use app\models\Transactions;

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
            \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Mach 1 Success'));
            //}
            //\Yii::$app->getSession()->setFlash('success', Yii::t('app','Mach2 Success'));
        }

        return $this->render('intmatch', array(
                    'model' => $model,
        ));
    }

    protected function inDataColumn($data, $row) {
        // ... generate the output for the column
        // Params:
        // $data ... the current row data   
        // $row ... the row index    
        return $this->renderPartial('_trans', array('cdata' => $data, 'intType' => 1));
    }

    protected function outDataColumn($data, $row) {
        // ... generate the output for the column
        // Params:
        // $data ... the current row data   
        // $row ... the row index    
        return $this->renderPartial('_trans', array('cdata' => $data, 'intType' => 0));
    }

    public function actionDispmatch() {

        $match = new IntCorrelation();
        if (isset($_POST['FormExtmatch'])) {
            $match->attributes = $_POST['FormExtmatch'];
        }
        return $this->render('admin', array(
                    'model' => $match,
        ));
    }

    public function actionIntmatchajax() {

        $in = new Transactions();
        $out = new Transactions();
        $in->scenario = 'search';
        $out->scenario = 'search';


        //$in->unsetAttributes();
        //$out->unsetAttributes();

        if (isset($_POST['FormIntmatch'])) {
            $in->attributes = $_POST['FormIntmatch'];
            $out->attributes = $_POST['FormIntmatch'];
        }
        return $this->renderPartial('intmatchajax', array('in' => $in, 'out' => $out));
    }

    public function actionMatchdelete($id) {

        $model = IntCorrelation::findOne($id);
        if ($model === null)
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');

        $model->delete();

        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('dispmatch'));
    }

}
