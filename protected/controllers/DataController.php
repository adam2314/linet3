<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class DataController extends RightsController {//

    public function actionBackup() {
        if (isset($_GET['Backup'])) {
            $id = Yii::app()->user->Company;
            $comp = $this->loadModel($id); //chkAccess
            $comp->backup();
            $this->redirect('backup');
        }
        $model=new Files('search');
        $model->path="backup/";
        //if(isset($_POST['name'])){
        //Yii::import('ext.dumpDB.dumpDB');
        //$dumper = new dbDump();
        //echo $dumper->getDump(true);
        //Yii::app()->end();
        // }
        $this->render('backup', array(
                'model'=>$model,
        ));
    }

    public function actionRestore($id=null) {
        $model = new FormBackupFile;
        $comp = $this->loadModel(Yii::app()->user->Company); 
        if (isset($_POST['FormBackupFile'])) {
            $bkup = Company::getFilePath() . "tmp.zip";
            $model->file = $_POST['FormBackupFile']['file'];
            $model->file = CUploadedFile::getInstance($model, 'file');
            if ($model->file->saveAs($bkup)) {
                $comp->restore($bkup);
                $this->redirect('/settings/dashboard');
            }
        }
        if($id!=null){
            $file=  Files::model()->findByPk($id);
            if($file!=null){
                $comp->restore($file->getFullFilePath());
                $this->redirect('/settings/dashboard');
            }else
                throw new CHttpException(500, 'The backup file does not exist.');
        }
        //read file            
        //if DROP TABLE IF EXISTS `            
        //if CREATE TABLE `         
        //INSERT INTO `

        $this->render('backupRestore', array('model' => $model));
    }

    public function actionPcn874() {
        $model = new FormReportPcn874('search');
        if (isset($_POST['FormReportPcn874'])) {
            $model->attributes = $_POST['FormReportPcn874'];

            return Yii::app()->getRequest()->sendFile("pcn874.txt", $model->make());
        }
        $this->render('pcn874', array('model' => $model,));
    }

    /*
      public function actionPcn874ajax(){
      $model=new FormReportPcn874('search');

      $model->unsetAttributes();
      if(isset($_POST['FormReportPcn874'])){
      $model->attributes=$_POST['FormReportPcn874'];

      return Yii::app()->getRequest()->sendFile("pcn874.txt", $model->make());
      }
      $this->renderPartial('pcn874ajax',array('model'=>$model ));

      } */

    public function actionOpenfrmt() {
        $model = new FormOpenfrmt();
        if (isset($_POST['FormOpenfrmt'])) {
            $model->attributes = $_POST['FormOpenfrmt'];

            if ($model->make()) {
                $this->renderPartial('openfrmtajax', array('model' => $model));
                Yii::app()->end();
            }
            //return Yii::app()->getRequest()->sendFile("pcn874.txt", $model->make());
        }
        $this->render('openfrmt', array('model' => $model,));
    }

    public function actionDownload($id) {
        $id = (int) $id;
        $model = Files::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        //$configPath=Yii::app()->user->settings["company.path"];
        $file = $model->getFullFilePath(); //????.$model->id;
        //echo $file.'end';
        return Yii::app()->getRequest()->sendFile($model->name, file_get_contents($file));
    }

    public function actionOpenfrmtimport() {
        $model = new FormOpenfrmt();


        if (isset($_POST['SwitchType'])) {
            //save current
            //$corComp=Yii::app()->user->Database->id;

            $newComp = (int) $_POST['companyId'];
            //company load
            Company::model()->select($newComp);

            foreach ($_POST['SwitchType'] as $old => $new) {
                Acctype::model()->switchType($old, $new);
            }

            //end
            $this->redirect('company');
        }
        if (isset($_POST['FormOpenfrmt'])) {

            //$yiiUser=Yii::app()->user->id;
            //$configPath=Yii::app()->user->settings["company.path"];

            $file = Company::getFilePath() . "ini.txt";

            $model->iniFile = $_POST['FormOpenfrmt']['iniFile'];
            $model->iniFile = CUploadedFile::getInstance($model, 'iniFile');
            if ($model->iniFile->saveAs($file)) {
                $model->iniFile = $file;
                //$model->read();
            }

            $file = Company::getFilePath() . "/bkmv.txt";
            $model->bkmvFile = $_POST['FormOpenfrmt']['bkmvFile'];
            $model->bkmvFile = CUploadedFile::getInstance($model, 'bkmvFile');
            if ($model->bkmvFile->saveAs($file)) {
                $corComp = Yii::app()->user->Database->id;
                $model->bkmvFile = $file;
                $model->readIni();
                Company::model()->select($model->companyId);
                $model->readBkmv();
                Company::model()->select($corComp);
            }
            $this->render('openfrmtimportajax', array('model' => $model,));

            Yii::app()->end();
        }



        $this->render('openfrmtimport', array('model' => $model,));
        //echo $model->read();
    }

    public function actionLinet2Import() {
        $model = new FormLinet2Import;
        if (isset($_POST['FormLinet2Import'])) {

            $configPath = Yii::app()->user->settings["company.path"];

            $file = Company::getFilePath() . "linet2.bak";

            $model->file = $_POST['FormLinet2Import']['file'];
            $model->file = CUploadedFile::getInstance($model, 'file');

            if ($model->file === null)
                throw new CHttpException(501, Yii::t('app', 'Error in request.')); //no file
            if ($model->file->saveAs($file)) {
                $model->file = $file;

                $model->import();
                //$model->read();
            }
        }
        $this->render('linet2Import', array('model' => $model,));
        Yii::app()->end();
    }
    
    
    public function loadModel($id)
	{
		$model=Company::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}

?>
