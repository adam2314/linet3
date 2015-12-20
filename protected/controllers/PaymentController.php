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
use app\models\PaymentType;
use app\helpers\EAVHelper;

class PaymentController extends RightsController {

    public function actionAdmin() {
        $model = new PaymentType();
        //$model->unsetAttributes();  // clear any default values
        if (isset($_GET['PaymentType']))
            $model->attributes = $_GET['PaymentType'];

        return $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        
        if (isset($_POST['Settings'])) {
            //$this->performAjaxValidation($_POST['Settings']);
            foreach ($_POST['Settings'] as $key => $value) {
                $smodel = Settings::findOne($key);
                $smodel->value = $value['value'];

                //will stop


                $smodel->save();
            }

            //\app\helpers\Linet3Helper::getSetting();
            //$comp = Company::findOne(Yii::$app->user->Company);
            //$comp->loadSettings();
        }
        
        
        if (isset($_POST['PaymentType'])) {
            $model->attributes = $_POST['PaymentType'];
            if ($model->save())
                $this->redirect(array('update', 'id' => $model->id));
        }

        return $this->render('update', array(
            'model' => $model,
            //'items' => $items,
        ));
        
        
        
        
        
        
        
    }

    public function actionFields($id) {
        $model = $this->loadModel($id);
        //echo \yii\helpers\Json::encode("echo ".$model->value);

        $form=$model->loadPayment();


        //$form = new $model->value;
        $form->type = $id;
        $form->sum = $_POST['bill']['sum'];
        $form->line = (int) $_POST['bill']['line'];
        $text = '';
        foreach ($form->field() as $field => $type) {
            $rType=$type;
            $value='';
            if(is_array($rType)){
                $rType=$type['type'];
                $value=$type['value'];
            }
            $text.=EAVHelper::addRow($field, $value, $rType, 'Doccheques[' . $form->line . ']');
        }

        echo \yii\helpers\Json::encode(array("line" => $form->line, "form" => $text, "bill" => $form->stoppage()));
    }

    public function actionForm($id) {
        $model =  $this->loadModel($id);
        //echo \yii\helpers\Json::encode("echo ".$model->value);

        
        $form = $model->loadPayment();
        $form->type = $id;
        $form->sum = $_POST['bill']['sum'];
        $form->line = $_POST['bill']['line'];
        echo yii\helpers\Json::encode(array($form->line, $form->stoppage()));
    }

    public function actionBill($id) {
        $model = $this->loadModel($id);

        $bill=$model->loadPayment();

        $bill->setFields($_POST['bill']);

        $result = $bill->bill();
        //echo \yii\helpers\Json::encode(array("code" => $result["code"], "text" => $result["text"], "desc" => $this->parseCode($result["code"]), 'bill' => true));
        echo yii\helpers\Json::encode(array("code" => $result["code"], "text" => $result["text"], "desc" => $this->parseCode($result["code"]), 'bill' => $result["bill"]));
    }

    private function parseCode($code) {
        $rec = creditErrorCode::findOne($code);

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
        $model = PaymentType::findOne($id);
        if ($model === null)
            throw new \yii\web\HttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
