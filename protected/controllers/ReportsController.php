<?php

class ReportsController extends RightsController {

    /**
     * Declares class-based actions.
     */
    public function actionMprofloss() {
        $model = new FormMprofloss('search');
        //$model->unsetAttributes();

        $this->render('mprofloss', array('model' => $model,));
    }

    public function actionMproflossajax() {
        $model = new FormMprofloss('search');
        //$trans=new Transactions('search');



        $model->unsetAttributes();

        if (isset($_POST['FormMprofloss'])) {

            $model->attributes = $_POST['FormMprofloss'];
            //$trans->attributes=$_POST['FormProfloss'];
        }
        $this->renderPartial('mproflossajax', array('model' => $model));
    }

    public function actionProfloss() {
        $model = new FormProfloss('search');
        //$model->unsetAttributes();

        $this->render('profloss', array('model' => $model,));
    }

    public function actionProflossajax() {
        $model = new FormProfloss('search');
        //$trans=new Transactions('search');



        $model->unsetAttributes();
        if (isset($_POST['FormProfloss'])) {
            $model->attributes = $_POST['FormProfloss'];
            //$trans->attributes=$_POST['FormProfloss'];
        }
        $this->renderPartial('proflossajax', array('model' => $model));
    }

    public function actionBalance() {
        $model = new FormReportBalance('search');
        //$model->unsetAttributes();

        $this->render('balance', array('model' => $model,));
    }

    public function actionBalanceajax() {
        $model = new FormReportBalance('search');

        $model->unsetAttributes();
        if (isset($_POST['FormReportBalance'])) {
            $model->attributes = $_POST['FormReportBalance'];
        }
        $this->renderPartial('balanceajax', array('model' => $model));
    }

    public function actionStockAction() {
        $model = new stockAction('search');
        $model->unsetAttributes();
        $vl = 'stockAction-grid';
        //echo Yii::app()->request->isAjaxRequest;
        //Yii::app()->end();
        if (isset($_POST['stockAction']))
            $model->attributes = $_POST['stockAction'];
        if (Yii::app()->request->isAjaxRequest || isset($_POST['ajax']) && $_POST['ajax'] === $vl) {


            // Render partial file created in Step 1
            $this->renderPartial('stockAction', array(
                'model' => $model,
            ));
            Yii::app()->end();
        }



        $this->render('stockAction', array('model' => $model,));
    }

    public function actionStock() {
        $model = new stockAction('search');
        $model->unsetAttributes();
        $vl = 'stockAction-grid';
        //echo Yii::app()->request->isAjaxRequest;
        //Yii::app()->end();
        if (isset($_POST['stockAction']))
            $model->attributes = $_POST['stockAction'];
        if (Yii::app()->request->isAjaxRequest || isset($_POST['ajax']) && $_POST['ajax'] === $vl) {


            // Render partial file created in Step 1
            $this->renderPartial('stock', array(
                'model' => $model,
            ));
            Yii::app()->end();
        }



        $this->render('stock', array('model' => $model,));
    }

    public function actionJournal() {
        $model = new Transactions('search');
        $model->unsetAttributes();
        $vl = 'transactions-grid';
        //echo Yii::app()->request->isAjaxRequest;
        //Yii::app()->end();
        if (isset($_POST['Transactions']))
            $model->attributes = $_POST['Transactions'];
        if (Yii::app()->request->isAjaxRequest || isset($_POST['ajax']) && $_POST['ajax'] === $vl) {


            // Render partial file created in Step 1
            $this->renderPartial('journal', array(
                'model' => $model,
            ));
            Yii::app()->end();
        }



        $this->render('journal', array('model' => $model,));
    }

    public function actionOwe() {
        $model = new Accounts('search');
        $model->unsetAttributes();
        $model->type = 0; //could be dynamic

        $this->render('owe', array('model' => $model,));
    }

    public function actionVat() {
        $model = new FormReportVat();


        $this->performAjaxValidation($model);

        if (isset($_POST['FormReportVat'])) {
            $model->attributes = $_POST['FormReportVat'];
            if ($model->step == 1) {
                $model->pay();
            }



            $model->calcPay();

            $this->renderPartial('vat_preview', array('model' => $model,));
            Yii::app()->end();
        }


        $model->year = date('Y');
        $model->from_month = date('m');
        $model->to_month = date('m');

        $this->render('vat', array('model' => $model));
    }

    public function actionTaxrep() {
        $model = new FormReportTaxrep();


        $this->performAjaxValidation($model);
        if (isset($_POST['FormReportTaxrep'])) {
            $model->attributes = $_POST['FormReportTaxrep'];

            if ($model->step == 1) {
                $model->pay();
                echo "ok";
                Yii::app()->end();
            }



            $model->calcPay();

            $this->renderPartial('taxrep_preview', array('model' => $model,));
            Yii::app()->end();
        }


        $model->year = date('Y');
        $model->from_month = date('m');
        $model->to_month = date('m');

        $this->render('taxrep', array('model' => $model));
    }

    public function actionAccounts() {
        $model = new FormReportAccounts();

        $this->performAjaxValidation($model);
        if (isset($_POST["FormReportAccounts"])) {
            $model->attributes = $_POST['FormReportAccounts'];

            $this->renderPartial('accountsAjax', array('model' => $model));

            Yii::app()->end();
        }

        $this->render('accounts', array('model' => $model,));
    }

    public function actionInout() {
        $model = new FormReportInout('search');

        $this->render('Inout', array('model' => $model,));
    }

    public function actionInoutajax() {
        $model = new FormReportInout('search');

        $model->unsetAttributes();
        if (isset($_POST['FormReportInout'])) {
            $model->attributes = $_POST['FormReportInout'];
        }
        $this->renderPartial('Inoutajax', array('model' => $model));
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax'])) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
