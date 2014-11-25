<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaymentController
 *
 * @author adam
 */
class PaymentController extends RightsController {

    //put your code here
    public function actionFields($id) {
        $model = PaymentType::model()->findByPk($id);
        //echo CJSON::encode("echo ".$model->value);

        if ($model->value == '') {
            echo CJSON::encode(array($_POST['bill']['line'], false));
            Yii::app()->end();
        }


        $form = new $model->value;
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
        $model = PaymentType::model()->findByPk($id);
        //echo CJSON::encode("echo ".$model->value);

        if ($model->value == '') {
            echo CJSON::encode(array($_POST['bill']['line'], false));
            Yii::app()->end();
        }


        $form = new $model->value;
        $form->type = $id;
        $form->sum = $_POST['bill']['sum'];
        $form->line = $_POST['bill']['line'];
        echo CJSON::encode(array($form->line, $form->stoppage()));
    }

    public function actionBill($id) {
        $model = PaymentType::model()->findByPk($id);

        if ($model->value == '') {
            echo CJSON::encode(false);
            Yii::app()->end();
        }

        $bill = new $model->value;

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

}
