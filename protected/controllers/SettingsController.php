<?php

class SettingsController extends RightsController {

    public function actionDashboard() {
        $models = Settings::model()->findAll();
        $this->render('dashboard', array(
                //'models'=>$models,
        ));
    }

    public function actionAdmin() {/* used in the refnum selection */

        if (isset($_POST['Settings'])) {
            foreach ($_POST['Settings'] as $key => $value) {
                $model = Settings::model()->findByPk($key);
                $model->value = $value['value'];
                $model->save();
            }


            $comp = Company::model()->findByPk(Yii::app()->user->Company);
            $comp->loadSettings();
        }
        $models = Settings::model()->findAll();
        $this->render('view', array(
            'models' => $models,
        ));
    }

}
