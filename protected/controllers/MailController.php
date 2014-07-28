<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailController
 *
 * @author adam
 */
class MailController extends RightsController {

    public function actionCreate() {
        $model = new Mail;

        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);

        if (isset($_POST['Mail'])) {
            $model->attributes = $_POST['Mail'];
            if ($model->save())
                echo "done";
                //$this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
/*
    public function actionForm($id) {
        
        $type=$_POST['Mail']['obj'];
        
        $id=$_POST['Mail']['type'];
        $model = MailTemplate::model()->findByTypeId($type,$id);
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
*/
    //put your code here
}
