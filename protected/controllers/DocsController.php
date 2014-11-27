<?php

class DocsController extends RightsController {

    public function actionView($id = 0, $docnum = 0, $doctype = 0, $mail = 0) {// used in the refnum selection
        if ((int) $id != 0) {
            $model = $this->loadModel($id);
        } else {
            $model = Docs::model()->findByNum($doctype, $docnum);
            if ($model === null) {
                throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
            }
        }


        if (isset($_POST['subType'])) {
            $model->refnum_ids = $_POST['Docs']['refnum_ids'];
            return $this->doc($model, $mail);
        }
        //$docdetails =$model->docDetailes;
        //$doctype =$model->docType;


        $this->render('view', array(
            'model' => $model,
            'mail' => $mail
        ));
    }

    public function actionPdf($model = null, $return = true) {//usd for print*/
        $this->layout = 'print';
        if ($return) {
            return Yii::app()->getRequest()->sendFile($model->docType->name . "-" . "$model->docnum.pdf", $model->pdf()->readFile());
        } else {
            Response::send(200, $model->pdf());
        }
    }

    public function actionPrint($id, $preview = 0, $model = null, $return = false) {//usd for print*/
        if (isset($_POST['language']))
            Yii::app()->language = $_POST['language'];
        //Yii::app()->language='he_il';
        $this->layout = 'print';

        if (is_null($model))
            $model = $this->loadModel($id);

        $tmp=$model->printDoc();
        if ($return)
            return $tmp;
        echo $tmp;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($type = 1) {
        $type = (isset($_POST['Docs']['doctype'])) ? (int) $_POST['Docs']['doctype'] : $type;
        $model = new Docs();
        
        $model->doctype = $type;
        $model->docType = Doctype::model()->findByPk($type);
        if(!is_null($model->docType->oppt_account_type))
            $model->scenario="opppt_req";
        
        if($model->docType->id==9)//invrcpt
            $model->scenario="invrcpt";
        
        
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        
        if (isset($_POST['Docs'])) {
            $model->attributes = $_POST['Docs'];


            if (isset($_POST['Docdetails']))
                $model->docDet = $_POST['Docdetails'];
            if (isset($_POST['Doccheques']))
                $model->docCheq = $_POST['Doccheques'];

            return $this->doc($model);
        }

       
        
        $model->status = $model->docType->docStatus_id;
        $model->description = $model->docType->footer;
        $this->render('create', array(
            'model' => $model, //'type'=>$doctype,
        ));
    }

    private function doc($model, $mail = 0) {
        switch ($_POST['subType']) {
            case 'save':
                if ($model->save()){
                    $this->redirect(array('view', 'id' => $model->id));
                }else {
                    throw new CHttpException(400, Yii::t('app', 'Error Saving the documenet'));
                }
                return;
            case 'saveDraft':
                if ($model->isNewRecord) {
                    //find status not looked
                    $model->draftSave();
                } else {
                    if (!$model->docStatus->looked) {//status looked
                        //      find status not looked
                        $model->draftSave();
                    }
                }
                if ($model->save())
                    $this->redirect(array('admin'));
                else {
                    throw new CHttpException(400, Yii::t('app', 'Error Saving the documenet'));
                }
                return;
            case 'print':
                if ($model->save())
                    $this->redirect(array('print', 'id' => $model->id));
                else {
                    throw new CHttpException(400, Yii::t('app', 'Error Saving the documenet'));
                }
                //$this->redirect(array('update','id'=>$model->id));
                return;
            case 'preview':

                //$model->loadDet();
                $model->draftSave();
                $model->save();
                $this->actionPrint($model->id, 1, $model);
                $model->delete();
                return;
            case 'email':
                $model->save();
                //if ($model->save())
                //    $this->actionPdf($model, false);

                if ($mail == 0) {
                    $this->redirect(array('view', 'id' => $model->id, "mail" => 1));
                } else {
                    $this->actionPdf($model, false);
                }
                //$mail=new Mail();
                //$mail->loadTemplate();
                //$mail->to=$model->Account->mail;
                //$mail->files=File::id();

                return;
            case 'pdf':
                if ($model->save()) {
                    $this->actionPdf($model);
                } else {
                    throw new CHttpException(400, Yii::t('app', 'Error Saving the documenet'));
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
        $model = $this->loadModel($id);


        //$docdetails =$model->docDetailes;
        //$doctype =$model->docType;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($model->docStatus))
            if ($model->docStatus->looked == 1) {
                Yii::app()->user->setFlash('danger', Yii::t('app','Unable to edit document'));
                $this->redirect(array('admin', 'id' => $model->id));
            }
        if (isset($_POST['Docs'])) {
            $model->attributes = $_POST['Docs'];
            if (isset($_POST['Docdetails']))
                $model->docDet = $_POST['Docdetails'];
            if (isset($_POST['Doccheques']))
                $model->docCheq = $_POST['Doccheques'];

            return $this->doc($model);
        }



        $this->render('update', array(
            'model' => $model, //'type'=>$doctype,
        ));
    }

    public function actionDuplicate($id, $type = null) {
        $id = (int) $id;
        $model = $this->loadModel($id);

        if (!is_null($type))
            $model->doctype = (int) $type;
        $model->refnum = '';
        $model->printed = '';
        $model->refnum_ids = '';
        $model->status = $model->docType->docStatus_id; //switch status back to defult for doc

        if (isset($_POST['Docs'])) {
            $this->actionCreate();
        }



        $this->render('create', array(
            'model' => $model, 'type' => $model->docType,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModel($id);
            if (isset($model->docStatus)) {
                if ($model->docStatus->looked) {
                    Yii::app()->user->setFlash('danger', 'unable to delete documenet');
                    $this->redirect(array('admin', 'id' => $model->id));
                    return;
                } else {

                    // we only allow deletion via POST request
                    $this->loadModel($id)->delete();
                }
            }// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {

            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Docs');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {

        $model = new Docs('search');
        $model->unsetAttributes();  // clear any default values


        $vl = 'docs-grid';
        if (isset($_POST['Docs']))
            $model->attributes = $_POST['Docs'];
        if (Yii::app()->request->isAjaxRequest && isset($_POST['ajax']) && $_POST['ajax'] === $vl) {
            // Render partial file created in Step 1
            $this->renderPartial('_list', array(
                //'subscriberActiveDataProvider' => $subscriberActiveDataProvider,
                'model' => $model,
            ));
            Yii::app()->end();
        }



        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Docs::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'docs-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
