<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class NewUpdateController extends RightsController {

    public function init() {
        if (!Yii::app()->params['local']){
            Yii::app()->end();
        }
        
        parent::init();
    }
    
    

    public function actionIndex() {
        $model = new Update;

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionBackup() {
        $model = new Update;

        $model->backupDB();

        $this->renderPartial('backup', array(
            'model' => $model,
        ));
    }
    
    
    
    
    public function actionBackupFile() {
        $model = new Update;

        return Yii::app()->getRequest()->sendFile("Backup " . date("d-m-Y_H_i") . ".zip", file_get_contents($model->backupSys()));
    }

    public function actionUpdate() {
        $model = new Update;
        
        
        $this->renderPartial('update', array(
            'text' => $model->upgrade($model->getVersionI()),
        ));
    }

}
