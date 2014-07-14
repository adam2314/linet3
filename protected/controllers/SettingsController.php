<?php

class SettingsController extends RightsController {

    public function actionDashboard() {
        $models = Settings::model()->findAll();

        if (isset($_POST['Widget'])) {
            $user=User::model()->findByPk(Yii::app()->user->id);
            $user->saveWidget($_POST['Widget']);
            
            Yii::app()->end();
        }

        $this->render('dashboard', array(
                'models'=>$models,
        ));
    }

    public function actionAdminNew() {
        $model = new FormSettings;
        $model->loadAttributes();

        if (isset($_POST['FormSettings'])) {
            $model->attributes = $_POST['FormSettings'];
            if ($model->validate() && $model->save()) {
                //success code here, with redirect etc..
            }
        }
        $this->render('view', array('model' => $model));
    }

    public function actionAdmin() {/* used in the refnum selection */



        if (isset($_POST['Settings'])) {
            $this->performAjaxValidation($_POST['Settings']);
            foreach ($_POST['Settings'] as $key => $value) {
                $model = Settings::model()->findByPk($key);
                $model->value = $value['value'];

                //will stop


                $model->save();
            }


            $comp = Company::model()->findByPk(Yii::app()->user->Company);
            $comp->loadSettings();
        }
        $models = Settings::model()->findAll(array('order' => 'priority'));
        $this->render('view', array(
            'models' => $models,
        ));
    }

    protected function performAjaxValidation($attr) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'settings-form') {
            echo Settings::Tmvalidate($attr);
            Yii::app()->end();
        }
    }

}
