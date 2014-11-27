<?php

class AccountsController extends RightsController {

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionTransaction($id = 200) {
        $transactions = new Transactions('search');
        $transactions->unsetAttributes();
        $transactions->account_id = $id;
        $this->render('transaction', array('model' => $transactions, 'account' => $this->loadModel($id)));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($type = 0) {
        $model = new Accounts;


        $this->performAjaxValidation($model);

        if (isset($_POST['Accounts'])) {
            $model->attributes = $_POST['Accounts'];
            $model->deleteEavAttributes();
            if (isset($_POST['AccounteavE']) && isset($_POST['AccounteavE'])) {
                $model->setEavAttributes(array_combine($_POST['AccounteavE'], $_POST['AccounteavV']));
            }
            if ($model->save())
                $this->redirect(array('index', 'id' => $model->id));
        }

        $model->accType = Acctype::model()->findByPk((int) $type);
        $model->type = $type;
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {//$prefix
//print 'in action';
//Yii::app()->user->setFlash('error', 'unable to change sys account');
//Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You successfully read this important alert message.');
//Yii::app()->user->setFlash('info', '<strong>Heads up!</strong> This alert needs your attention, but it\'s not super important.');
//Yii::app()->user->setFlash('warning', '<strong>Warning!</strong> Best check yo self, you\'re not looking too good.');
//Yii::app()->user->setFlash('error', '<strong>Oh snap!</strong> Change a few things up and try submitting again.');
        $model = $this->loadModel($id);
        if ($model->system_acc == 1) {
            Yii::app()->user->setFlash('error', Yii::t('app', 'unable to edit, it is a system account'));
        }
        $this->performAjaxValidation($model);

        if (isset($_POST['Accounts'])) {
            $model->attributes = $_POST['Accounts'];
            if ($model->system_acc == 1) {
                Yii::app()->user->setFlash('error', Yii::t('app', 'unable to edit, it is a system account'));
            } else {
                $model->deleteEavAttributes();
                if (isset($_POST['AccountseavE']) && isset($_POST['AccountseavE'])) {
                    $model->setEavAttributes(array_combine($_POST['AccountseavE'], $_POST['AccountseavV']));
                }
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', Yii::t('app', "account saved"));
                } else {
                    Yii::app()->user->setFlash('error', Yii::t('app', "unable to save"));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {


        $model = $this->loadModel($id);

        if ($model->system_acc == 1) {
            $level = 'error';
            $text = Yii::t('app', "unable to delete, it is a system account");
        } else {


            if ($this->loadModel($id)->delete()) {
                $level = 'success';
                $text = Yii::t('app', "unable to delete, the account has transactions");
            } else {
                $level = 'error';
                $text = Yii::t('app', "unable to delete, the account has transactions");
            }
        }

        echo "<div class='alert in alert-block fade alert-$level'><a data-dismiss='alert' class='close'>×</a>$text</div>"; //flash 
        Yii::app()->end();
    }

    public function actionAutocomplete($type = 0, $term = '') {
        $res = Accounts::AutoComplete($term, $type);
        echo CJSON::encode($res);
        Yii::app()->end(); //*/
    }

    public function actionJSON($id = 0) {
        $model = Accounts::model()->findByPk($id);
        echo CJSON::encode($model);
        Yii::app()->end(); //*/
    }

    /**
     * Lists all models.
     */
    public function actionIndex($type = 0) {
//$type=isset($_GET['type'])?(int)$_GET['type']:0;



        $model = new Accounts('search');
        $model->type = $type;
        $vl = 'accounts-grid';
        if (isset($_POST['Accounts'])) {
            $model->attributes = $_POST['Accounts'];
        }
        if (isset($_GET['ajax'])) {//Yii::app()->request->isAjaxRequest && && $_GET['ajax'] === $vl
// Render partial file created in Step 1
            $this->renderPartial('ajax', array(
                'model' => $model,
            ));
            Yii::app()->end();
        }

        $this->render('index', array('type' => $type));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Accounts('search');
        $type = isset($_GET['type']) ? (int) $_GET['type'] : 0;
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Accounts']))
            $model->attributes = $_GET['Accounts'];

        $this->render('admin', array(
            'model' => $model,
            'type' => $type
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
//$model=Accounts::model()->findByPk($id);
        $model = Accounts::model()->findByPk($id);

        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'accounts-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
