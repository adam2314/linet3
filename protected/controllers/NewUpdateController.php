<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class NewUpdateController extends RightsController {

    public function init() {
        if (!Yii::app()->params['local']) {
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
