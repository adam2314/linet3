<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class MailController extends RightsController {

    public function actionCreate() {
        $model = new Mail;

        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);

        if (isset($_POST['Mail'])) {
            $model->attributes = $_POST['Mail'];
            if ($model->send()){
                //sent++
                
                echo "done";
                
            }
            //$this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionAdmin() {
        $model = new Mail('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Mail']))
            $model->attributes = $_GET['Mail'];

        $this->render('admin', array(
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
