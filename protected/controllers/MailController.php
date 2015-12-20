<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
namespace app\controllers;

use Yii;
use app\components\RightsController;
use app\models\Mail;
class MailController extends RightsController {

    public function actionCreate() {
        $model = new Mail;

        if ($model->load(Yii::$app->request->post())){
            if ($model->send()){
                //sent++
                
                echo "done";
                
            }
            //$this->redirect(array('view', 'id' => $model->id));
        }

        return $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionAdmin() {
        $model = new Mail();
        //$model->unsetAttributes();  // clear any default values

        $model->load(Yii::$app->request->get());
            //$model->attributes = $_GET['Mail'];

        return $this->render('admin', array(
            'model' => $model,
        ));
    }
    
    /*
      public function actionForm($id) {

      $type=$_POST['Mail']['obj'];

      $id=$_POST['Mail']['type'];
      $model = MailTemplate::findByTypeId($type,$id);
      //echo \yii\helpers\Json::encode("echo ".$model->value);

      if ($model->value == '') {
      echo \yii\helpers\Json::encode(array($_POST['bill']['line'], false));
      Yii::$app->end();
      }


      $form = new $model->value;
      $form->type = $id;
      $form->sum = $_POST['bill']['sum'];
      $form->line = $_POST['bill']['line'];
      echo \yii\helpers\Json::encode(array($form->line, $form->stoppage()));
      }
     */
    //put your code here
}
