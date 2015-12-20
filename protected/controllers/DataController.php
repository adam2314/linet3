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
use app\models\Files;
use app\models\Company;
use app\models\FormBackupFile;
use app\models\FormOpenfrmt;
use app\models\FormReportPcn874;
use app\models\FormLinet2Import;
class DataController extends RightsController {//

    public function actionBackup() {
        if (isset($_GET['Backup'])) {
            $id = $this->company;
            $comp = $this->loadModel($id); //chkAccess
            $comp->backup();
            $this->redirect('backup');
        }
        $model=new Files();
        $model->path="backup".DIRECTORY_SEPARATOR;
        $model->hidden=0;
        //if(isset($_POST['name'])){
        //Yii::import('ext.dumpDB.dumpDB');
        //$dumper = new dbDump();
        //echo $dumper->getDump(true);
        //Yii::$app->end();
        // }
        return $this->render('backup', array(
                'model'=>$model,
        ));
    }

    public function actionRestore($id=null) {
        $model = new FormBackupFile;
        $comp = $this->loadModel($this->company); 
        if (isset($_POST['FormBackupFile'])) {
            $bkup = Company::getFilePath() . "tmp.zip";
            $model->file = $_POST['FormBackupFile']['file'];
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->file->saveAs($bkup)) {
                $comp->restore($bkup);
                return $this->redirect(\yii\helpers\BaseUrl::base().'/settings/dashboard');
            }
        }
        if($id!=null){
            $file=  Files::findOne($id);
            if($file!=null){
                $comp->restore($file->getFullFilePath());
                $this->redirect(\yii\helpers\BaseUrl::base().'/settings/dashboard');
            }else
                throw new \yii\web\HttpException(500, 'The backup file does not exist.');
        }
        //read file            
        //if DROP TABLE IF EXISTS `            
        //if CREATE TABLE `         
        //INSERT INTO `

        return $this->render('backupRestore', array('model' => $model));
    }

    public function actionPcn874() {
        $model = new FormReportPcn874();
        if (isset($_POST['FormReportPcn874'])) {
            $model->attributes = $_POST['FormReportPcn874'];

            return Yii::$app->getResponse()->sendContentAsFile( $model->make(),"pcn874.txt");
        }
        return $this->render('pcn874', array('model' => $model,));
    }

    /*
      public function actionPcn874ajax(){
      $model=new FormReportPcn874();

      //$model->unsetAttributes();
      if(isset($_POST['FormReportPcn874'])){
      $model->attributes=$_POST['FormReportPcn874'];

      return Yii::$app->getRequest()->sendFile("pcn874.txt", $model->make());
      }
      return $this->renderPartial('pcn874ajax',array('model'=>$model ));

      } */

    public function actionOpenfrmt() {
        $model = new FormOpenfrmt();
        if (isset($_POST['FormOpenfrmt'])) {
            $model->attributes = $_POST['FormOpenfrmt'];

            if ($model->make($this->company)) {
                return $this->render('openfrmtajax', array('model' => $model));//renderPartial
                Yii::$app->end();
            }
            //return Yii::$app->getRequest()->sendFile("pcn874.txt", $model->make());
        }
        return $this->render('openfrmt', array('model' => $model,));
    }

    public function actionDownload($id) {
        $id = (int) $id;
        $model = Files::findOne($id);
        if ($model === null) {
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');
        }
        //$configPath=\app\helpers\Linet3Helper::getSetting("company.path");
        $file = $model->getFullFilePath(); //????.$model->id;
        //echo $file.'end';
        return Yii::$app->getResponse()->sendFile($file,$model->name);//, file_get_contents()
    }

    public function actionOpenfrmtimport() {
        $model = new FormOpenfrmt();


        if (isset($_POST['SwitchType'])) {
            //save current
            //$corComp=Yii::$app->user->Database->id;

            $newComp = (int) $_POST['companyId'];
            //company load
            Company::select($newComp);

            foreach ($_POST['SwitchType'] as $old => $new) {
                \app\models\Acctype::switchType($old, $new);
            }

            //end
            //$this->redirect(\yii\helpers\BaseUrl::base() . '/company/index');
        }
        if (isset($_POST['FormOpenfrmt'])) {

            //$yiiUser=Yii::$app->user->id;
            //$configPath=\app\helpers\Linet3Helper::getSetting("company.path");

            $file = Company::getFilePath() . "ini.txt";

            $model->iniFile = $_POST['FormOpenfrmt']['iniFile'];
            $model->iniFile = \yii\web\UploadedFile::getInstance($model, 'iniFile');
            if ($model->iniFile->saveAs($file)) {
                $model->iniFile = $file;
                //$model->read();
            }

            $file = Company::getFilePath() . "/bkmv.txt";
            $model->bkmvFile = $_POST['FormOpenfrmt']['bkmvFile'];
            $model->bkmvFile = \yii\web\UploadedFile::getInstance($model, 'bkmvFile');
            if ($model->bkmvFile->saveAs($file)) {
                //$corComp = ;
                $model->bkmvFile = $file;
                $model->readIni();
                $this->company=$model->companyId;
                Company::select($this->company);
                $model->readBkmv();
                Company::select($this->company);
            }
            return $this->render('openfrmtimportajax', array('model' => $model,));

            Yii::$app->end();
        }



        return $this->render('openfrmtimport', array('model' => $model,));
        //echo $model->read();
    }

    public function actionLinet2import() {
        $model = new FormLinet2Import;
        if (isset($_POST['FormLinet2Import'])) {

            $configPath = \app\helpers\Linet3Helper::getSetting("company.path");

            $file = Company::getFilePath() . "linet2.bak";

            $model->file = $_POST['FormLinet2Import']['file'];
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');

            if ($model->file === null)
                throw new \yii\web\HttpException(501, Yii::t('app', 'Error in request.')); //no file
            if ($model->file->saveAs($file)) {
                $model->file = $file;

                $model->import();
                //$model->read();
            }
        }
        return $this->render('linet2Import', array('model' => $model,));
        Yii::$app->end();
    }
    
    
    public function loadModel($id)
	{
		$model=Company::findOne($id);
		if($model===null)
			throw new \yii\web\HttpException(404,'The requested page does not exist.');
		return $model;
	}

}

?>
