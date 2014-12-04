<?php

class BankbookController extends RightsController {

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Bankbook;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Bankbook'])) {
            $model->attributes = $_POST['Bankbook'];
            if ($model->save())
                $this->redirect(array('bankbook/admin/'. $model->account_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Bankbook'])) {
            $model->attributes = $_POST['Bankbook'];
            if ($model->save())
                $this->redirect(array('bankbook/admin/'. $model->account_id));
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
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model=$this->loadModel($id);
            $account_id=$model->account_id;
                    $model->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin/'.$account_id));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionAdmin($id=null) {
        $model = new Bankbook('search');
        $model->unsetAttributes();  // clear any default values
        if($id!==null)
            $model->account_id=$id;
        if (isset($_POST['Bankbook']['file'])) {

            $model->import((int) $_POST['Bankbook']['account_id']);
            //Yii::app()->end();
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAjax() {
        $model = new Bankbook('search');
        $model->unsetAttributes();
        //$model->account_id=$account_id;
        if (isset($_POST['Bankbook'])) {
            $model->attributes = $_POST['Bankbook'];
        }
        $this->renderPartial('ajax', array('model' => $model,));
    }

    public function actionEdispmatch() {
        $match = new ExtCorrelation('search');
        if (isset($_POST['FormExtmatch'])) {
            $match->attributes = $_POST['FormExtmatch'];
        }
        $this->render('disp', array(
            'model' => $match,
        ));
    }

    public function actionExtmatch() {
        $extmatch = new FormExtmatch('search');
        $model = new Bankbook('search');
        $model->unsetAttributes();  // clear any default value

        if (isset($_POST['FormExtmatch'])) {
            //$extmatch->attributes=$_POST['FormExtmatch'];
            //if(){
            $this->performAjaxValidation($extmatch);

            //$extmatch->bankbooks = $_POST['FormExtmatch']['Bankbook']['match'];
            //$extmatch->transactions = $_POST['FormExtmatch']['Trans']['match'];
            $extmatch->attributes = $_POST['FormExtmatch'];
            $extmatch->save();
            Yii::app()->user->setFlash('success', Yii::t('app', 'Mach 1 Success'));
            //}
            //Yii::app()->user->setFlash('success', Yii::t('app','Mach2 Success'));
        }

        $this->render('extmatch', array(
            'model' => $model, 'extmatch' => $extmatch,
        ));
    }

    protected function bankDataColumn($data, $row) {
        // ... generate the output for the column
        // Params:
        // $data ... the current row data   
        // $row ... the row index    
        $this->renderPartial('_bank', array('cdata' => $data));
    }

    protected function transDataColumn($data, $row) {
        // ... generate the output for the column
        // Params:
        // $data ... the current row data   
        // $row ... the row index    
        $this->renderPartial('_trans', array('cdata' => $data));
    }

    public function actionMatchDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = ExtCorrelation::model()->findByPk($id);
            if ($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');

            $model->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionExtmatchajax() {

        $model = new Bankbook('search');
        $trans = new Transactions('search');



        $model->unsetAttributes();
        $trans->unsetAttributes();
        //$model->account_id=$account_id;
        if (isset($_POST['FormExtmatch'])) {
            $model->attributes = $_POST['FormExtmatch'];
            $trans->attributes = $_POST['FormExtmatch'];
        }

        $model->extCorrelation = 0;
        $trans->extCorrelation = 0;
        $this->renderPartial('extmatchajax', array('model' => $model, 'trans' => $trans));
    }

    protected function performAjaxValidation($model) {
        //$model=new FormExtmatch('search');
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'extmatch-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function loadModel($id) {
        $model = Bankbook::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
