<?php

class InstallController extends Controller {

    public $layout = '//layouts/clean';

    public function actionIndex($step = 0) {
        try {
            if (isset(Yii::app()->dbMain)) {
                if (!isset(Yii::app()->user->Install))
                    return;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        //print_r(Yii::app()->dbMain);
        Yii::app()->user->setState('Install', 1);
        
        
        if (isset($_POST['InstallConfig'])) {
            $model = new InstallConfig();
            $model->attributes = $_POST['InstallConfig'];
            if($model->make()){
                unset(Yii::app()->user->Install);
                $this->redirect(Yii::app()->createAbsoluteUrl('install/user'));
            }
            //exit;
        }
        

        if ($step == 0) {//pre
            $model = new InstallPre();
            $this->render('Pre', array('model' => $model));
        }

        if ($step == 1) {//recheck
            $model = new InstallPre();

            $this->renderPartial('Pre', array('model' => $model));
        }
        if ($step == 2) {//config
            $model = new InstallConfig();
            $this->renderPartial('config', array('model' => $model));
        }

        
        //*/
    }

    public function actionUser() {
        if(!User::model()->findAll()==null){
            $this->redirect(Yii::app()->createAbsoluteUrl('site/login'));
                Yii::app()->end();
        }


        //user
        $model = new User();
        $model->scenario = 'create';

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];

            if ($model->save()){
                $this->redirect(array('company/admin'));
                
            }
        }

        $this->render('user', array('model' => $model));
    }

}
