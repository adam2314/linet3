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
use app\components\LitController;
class InstallController extends LitController {

    public $layout = '//layouts/main';

    public function actionIndex($step = 0) {
        try {
            if (isset(Yii::$app->dbMain)) {
                if (!isset(Yii::$app->user->Install))
                    return;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        //print_r(Yii::$app->dbMain);
        Yii::$app->user->setState('Install', 1);
        
        
        if (isset($_POST['InstallConfig'])) {
            $model = new InstallConfig();
            $model->attributes = $_POST['InstallConfig'];
            if($model->make()){
                unset(Yii::$app->user->Install);
                $this->redirect(Yii::$app->createAbsoluteUrl('install/user'));
            }
            //exit;
        }
        

        if ($step == 0) {//pre
            $model = new InstallPre();
            return $this->render('Pre', array('model' => $model));
        }

        if ($step == 1) {//recheck
            $model = new InstallPre();

            return $this->renderPartial('Pre', array('model' => $model));
        }
        if ($step == 2) {//config
            $model = new InstallConfig();
            return $this->renderPartial('config', array('model' => $model));
        }

        
        //*/
    }

    public function actionUser() {
        if(!User::find()->All()==null){
            $this->redirect(Yii::$app->createAbsoluteUrl('site/login'));
                Yii::$app->end();
        }


        //user
        $model = new User();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())){

            if ($model->save()){
                $this->redirect(array('company/admin'));
                
            }
        }

        return $this->render('user', array('model' => $model));
    }
    

}
