<?php

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class PaymentController extends RightsController {

    public function actionAdmin() {
        $model = new PaymentType('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PaymentType']))
            $model->attributes = $_GET['PaymentType'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        
        if (isset($_POST['Settings'])) {
            //$this->performAjaxValidation($_POST['Settings']);
            foreach ($_POST['Settings'] as $key => $value) {
                $smodel = Settings::model()->findByPk($key);
                $smodel->value = $value['value'];

                //will stop


                $smodel->save();
            }


            $comp = Company::model()->findByPk(Yii::app()->user->Company);
            $comp->loadSettings();
        }
        
        
        if (isset($_POST['PaymentType'])) {
            $model->attributes = $_POST['PaymentType'];
            if ($model->save())
                $this->redirect(array('update', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            //'items' => $items,
        ));
        
        
        
        
        
        
        
    }

    public function actionFields($id) {
        $model = $this->loadModel($id);
        //echo CJSON::encode("echo ".$model->value);

        $form=$model->loadPayment();


        //$form = new $model->value;
        $form->type = $id;
        $form->sum = $_POST['bill']['sum'];
        $form->line = (int) $_POST['bill']['line'];
        $text = '';
        foreach ($form->field() as $field => $type) {
            $text.=EAVHelper::addRow($field, '', $type, 'Doccheques[' . $form->line . ']');
        }

        echo CJSON::encode(array("line" => $form->line, "form" => $text, "bill" => $form->stoppage()));
    }

    public function actionForm($id) {
        $model =  $this->loadModel($id);
        //echo CJSON::encode("echo ".$model->value);

        
        $form = $model->loadPayment();
        $form->type = $id;
        $form->sum = $_POST['bill']['sum'];
        $form->line = $_POST['bill']['line'];
        echo CJSON::encode(array($form->line, $form->stoppage()));
    }

    public function actionBill($id) {
        $model = $this->loadModel($id);

        $bill=$model->loadPayment();

        $bill->setFields($_POST['bill']);

        $result = $bill->bill();
        //echo CJSON::encode(array("code" => $result["code"], "text" => $result["text"], "desc" => $this->parseCode($result["code"]), 'bill' => true));
        echo CJSON::encode(array("code" => $result["code"], "text" => $result["text"], "desc" => $this->parseCode($result["code"]), 'bill' => $result["bill"]));
    }

    private function parseCode($code) {
        $rec = creditErrorCode::model()->findByPk($code);

        if ($rec === null) {
            return Yii::t('app', 'Error') . ": " . Yii::t('app', 'Another error ocurred');
        } else {
            if ($code == '000') {
                return Yii::t('app', 'Result') . ": " . $rec->text . "<br /><a href='javascript:makeRcpt();' class='btn btn-primary'>" . Yii::t('app', 'OK') . "</a>";
            } else {
                return Yii::t('app', 'Error') . ": " . $rec->text;
            }
        }
    }

    public function loadModel($id) {
        $model = PaymentType::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'paymentType-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
