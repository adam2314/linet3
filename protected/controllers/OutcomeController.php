<?php

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class OutcomeController extends RightsController{
    public function actionCreate($type=0){
        $model=new FormOutcome();
        
        
        if ($type == 1) {
            $model->account_id = Yii::app()->user->settings["company.acc.payvat"];
            
            $model->sum=Accounts::model()->findByPk($model->account_id)->getBalance();
            
        }
        if ($type == 2) {
            $model->account_id = Yii::app()->user->settings["company.acc.natinspay"];
            $model->sum=Accounts::model()->findByPk($model->account_id)->getBalance();
        }


        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model);
        if (isset($_POST['FormOutcome'])) {
            $model->attributes = $_POST['FormOutcome'];
            if($model->transaction())
                Yii::app()->user->setFlash('success', Yii::t('app','transaction Success'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'outcome-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

?>
