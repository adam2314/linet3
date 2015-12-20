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
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\helpers\Response;
use app\components\RightsController;
use app\models\Docs;
use app\models\DocsSearch;
use app\models\Doctype;

class DocsController extends RightsController {

    public function actionView($id = 0, $docnum = 0, $doctype = 0, $mail = 0,$pdf=0) {// used in the refnum selection
        if ((int) $id != 0) {
            $model = $this->findModel($id);
        } else {
            $model = Docs::findByNum($doctype, $docnum);
            if ($model === null) {
                throw new \yii\web\HttpException(404, Yii::t('app', 'The requested page does not exist.'));
            }
        }
        $model->scenario="vupdate";
        if ($model->load(Yii::$app->request->post())&&$model->validate()) {
            $model->save();
            $this->doc($model,$mail);
            
            
        }
        
        $model->preview=1;

        return $this->render('view', array(
            'model' => $model,
            'mail' => $mail,
            'pdf' => $pdf
        ));
    }

    public function actionPdf($model = null, $return = true,$id=null) {//usd for print*/
        $this->layout = 'print';
        if($id!==null)
            $model=$this->findModel($id);
        //if(!$this->hasCallback())
        if ($return) {
            return Yii::$app->getResponse()->sendFile($model->pdf()->getFullFilePath(),$model->docType->name . "-" . "$model->docnum.pdf");
        } else {
            Response::send(200, $model->pdf());
        }
    }

    public function actionPrint($id, $model = null, $return = false) {//usd for print*/
        if (isset($_POST['language']))
            Yii::$app->language = $_POST['language'];
        //Yii::$app->language='he_il';
        $this->layout = 'print';

        if (is_null($model))
            $model = $this->findModel($id);

        $tmp=$model->printDoc();
        if ($return)
            return $tmp;
        echo $tmp;
    }

    
    public function actionCalc(){
        $model = new Docs();
         if (isset($_POST['docs'])) {
            $model->attributes = $_POST['docs'];
            if (isset($_POST['Docdetails']))
                $model->docDet = $_POST['Docdetails'];
            if (isset($_POST['Doccheques']))
                $model->docCheq = $_POST['Doccheques'];

            return \app\helpers\Response::send(200,$model->calc());
        }
    }
    
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($type = 1,$account_id=0) {
        $type = (isset($_POST['docs']['doctype'])) ? (int) $_POST['docs']['doctype'] : $type;
        $model = new Docs(['doctype'=>(int)$type,'account_id'=>(int)$account_id]);
        
        if(!is_null($model->docType->oppt_account_type))
            $model->scenario="opppt_req";
        
        if($model->docType->id==9)//invrcpt
            $model->scenario="invrcpt";
        
        if ($model->load(Yii::$app->request->post())) {
            if (isset($_POST['Docdetails']))
                $model->docDet = $_POST['Docdetails'];
            if (isset($_POST['Doccheques']))
                $model->docCheq = $_POST['Doccheques'];
            
            
            
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\bootstrap\ActiveForm::validate($model);
            }
            
            if($model->validate()){
                return $this->doc($model);
            }
        }

       
        $model->discount = 0;
        $model->status = $model->docType->docStatus_id;
        $model->description = $model->docType->footer;
        return $this->render('create', array(
            'model' => $model, //'type'=>$doctype,
        ));
    }
    public function actionRefstatus($id) {
        $model = $this->findModel((int)$id);
        $model->refstatus=!($model->refstatus);
        if($model->save(false))
            return \app\helpers\Response::send(200,true);
        else
            return \app\helpers\Response::send(500,$model->errors);

        
    }
    private function doc($model, $mail = 0) {
        if(isset($_POST['subType'])){
            $model->docAction=$_POST['subType'];
        }
        switch ($model->docAction) {
            //case 'calc':
            //    return \app\helpers\Response::send(200,$model->calc());
            case 'save':
                if ($model->save()){
                    return $this->redirect(array('view', 'id' => $model->id));
                }else {
                    throw new \yii\web\HttpException(400, Yii::t('app', 'Error Saving the documenet').print_r($model->errors,true));
                }
                return;
            case 'saveDraft':
                if ($model->isNewRecord) {
                    $model->draftSave();
                } else {
                    if (!$model->docStatus->looked) {//status looked
                        $model->draftSave();
                    }
                }
                if ($model->save())
                    return $this->redirect(array('admin'));
                else {
                    throw new \yii\web\HttpException(400,Yii::t('app', 'Error Saving the documenet').print_r($model->errors,true));
                }
                return;
            case 'print':
                if ($model->save())
                    return $this->actionPrint($model->id);
                else {
                    throw new \yii\web\HttpException(400, Yii::t('app', 'Error Saving the documenet').print_r($model->errors,true));
                }
                //$this->redirect(array('update','id'=>$model->id));
                return;
            case 'preview':


                $model->preview=1;
                $model->draftSave();
                $model->save();
                
                $this->actionPrint($model->id, $model);
                $model->delete();
                return;
            case 'email':
                $model->save();

                if ($mail == 0) {
                    return $this->redirect(array('view', 'id' => $model->id, "mail" => 1));
                } else {
                    return $this->actionPdf($model, false);
                }

                return;
            case 'pdf':
                if ($model->save()) {
                    return $this->redirect(array('view', 'id' => $model->id, "pdf" => 1));
                } else {
                    throw new \yii\web\HttpException(400, Yii::t('app', 'Error Saving the documenet').print_r($model->errors,true));
                }

                return;
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $id = (int) $id;
        $model = $this->findModel($id);


        //$docdetails =$model->docDetailes;
        //$doctype =$model->docType;

        if (isset($model->docStatus))
            if ($model->docStatus->looked == 1) {
                \Yii::$app->getSession()->setFlash('danger', Yii::t('app','Unable to edit document'));
                $this->redirect(array('admin', 'id' => $model->id));
            }
        if ($model->load(Yii::$app->request->post())){
            if (isset($_POST['Docdetails']))
                $model->docDet = $_POST['Docdetails'];
            if (isset($_POST['Doccheques']))
                $model->docCheq = $_POST['Doccheques'];

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\bootstrap\ActiveForm::validate($model);
            }
            
            if($model->validate()){
                return $this->doc($model);
            }
            
            //return $this->doc($model);
        }

        //$model->issue_date = $model->readDate('now');
        //$model->due_date = $model->readDate('now');
        //$model->ref_date = $model->readDate('now');


        return $this->render('update', array(
            'model' => $model, //'type'=>$doctype,
        ));
    }

    public function actionDuplicate($id, $type = null) {
        $id = (int) $id;
        $model = $this->findModel($id);

        if (!is_null($type))
            $model->doctype = (int) $type;
        $model->refnum = '';
        $model->printed = '';
        $model->refnum_ids = '';
        $model->status = $model->docType->docStatus_id; //switch status back to defult for doc
        
        $model->issue_date =  $model->readDate('now');
        $model->due_date =  $model->readDate('now');
        $model->ref_date =  $model->readDate('now');
        
        if (isset($_POST['docs'])) {
            return $this->actionCreate();
            
        }



        return $this->render('create', array(
            'model' => $model, 'type' => $model->docType,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        //if (Yii::$app->request->isPostRequest) {
            $model = $this->findModel($id);
            if (isset($model->docStatus)) {
                if ($model->docStatus->looked) {
                    \Yii::$app->getSession()->setFlash('danger', 'unable to delete documenet');
                    $this->redirect(array('admin', 'id' => $model->id));
                    return;
                } else {

                    // we only allow deletion via POST request
                    $this->findModel($id)->delete();
                }
            }// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        //} else {

        //    throw new \yii\web\HttpException(400, 'Invalid request. Please do not repeat this request again.');
        //}
    }

    /**
     * Lists all models.
     */
    
    public function actionIndex() {
        //$dataProvider = new CActiveDataProvider('Docs');
        $model = new docs();
        if (isset($_POST['Docs']))
            $model->attributes = $_POST['Docs'];
        
        return $this->renderPartial('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $searchModel = new DocsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        

        $searchModel->scenario="search";
        
        $searchModel->load(Yii::$app->request->post());
        
        
        return $this->render('admin', array(
            'searchModel' => $searchModel,
            'dataProvider'=>$dataProvider
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function findModel($id) {
        $model = Docs::findOne($id);
        if ($model === null)
            throw new \yii\web\HttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

}
