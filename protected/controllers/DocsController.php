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
        $yiiBasepath = Yii::app()->basePath;
        $yiiUser = Yii::app()->user->id;
        $configPath = Yii::app()->user->settings["company.path"];
        $configCertpasswd = Yii::app()->user->certpasswd;
        $mypath = Yii::app()->params["filePath"] . $configPath . "/docs/";
        $myPdf = $mypath . $model->docType->name . "-$model->docnum.pdf";
        $myPdfS = $mypath . $model->docType->name . "-$model->docnum-signed.pdf";

        if (!file_exists($myPdf)) {
            $file = $this->actionPrint($model->id, 2, $model, true);
            $mPDF1 = Yii::app()->ePdf->mpdf();
            //$mPDF1 = Yii::app()->ePdf->mpdf('', 'A5');
            $mPDF1->WriteHTML($file);
            $mPDF1->Output($myPdf, 'F');
        }
        if (!file_exists($myPdfS)) {
            spl_autoload_unregister(array('YiiBase', 'autoload'));
            $oldpath = get_include_path();
            set_include_path($yiiBasepath . '/modules/zend_pdf_certificate/');

            include_once('Pdf.php');
            include_once('ElementRaw.php');
            //loads a sample PDF file
            $pdf = Farit_Pdf::load($myPdf);

            $cerfile = Yii::app()->params["filePath"] . $configPath . "/cert/" . $yiiUser . ".p12";

            if (file_exists($cerfile)) {
                $certificate = file_get_contents($cerfile);
                //password for the certificate

                $certificatePassword = $configCertpasswd;
                if (empty($certificate)) {
                    throw new Zend_Pdf_Exception('Cannot open the certificate file');
                }
                $pdf->attachDigitalCertificate($certificate, $certificatePassword);
                //here the digital certificate is inserted inside of the PDF document
                $renderedPdf = $pdf->render();
                file_put_contents($myPdfS, $renderedPdf);
            } else {
                set_include_path($oldpath);
                spl_autoload_register(array('YiiBase', 'autoload'));
                $link = "";

                $text = Yii::t('app', "Error! <br />
It is not possible to create a digitally signed PDF file and/or send it by mail without having certificate file located at current users' configuration page.
You should make a certificate file with third party software and import it through 'certificate file' field, separately for each user, within configuration zone of the user. You also should input the password for the certificate file in 'password for digital signature certificate' field in the above mentioned user configuration page.
You can find instructions for making self signed certificate file with Acrobat reader (One of the options. There are many applications able to make such a certificate out there)  here: ");



                throw new CHttpException(404, $text);
                //Yii::app()->end();
            }
            set_include_path($oldpath);
            spl_autoload_register(array('YiiBase', 'autoload'));
        }

        if (file_exists($myPdfS)) {
            $addon = "-signed.pdf";
        } else {
            $addon = ".pdf";
        }

        if ($return) {
            if ($addon == ".pdf")
                return Yii::app()->getRequest()->sendFile($model->docType->name . "-" . "$model->docnum" . $addon, file_get_contents($myPdf));
            else
                return Yii::app()->getRequest()->sendFile($model->docType->name . "-" . "$model->docnum" . $addon, file_get_contents($myPdfS));
        }else {

            $doc_file = new Files();
            $doc_file->name = $model->docType->name . "-" . "$model->docnum" . $addon; //it might be $img_add->name for you, filename is just what I chose to call it in my model
            $doc_file->path = "docs/";
            $doc_file->parent_type = get_class($model);
            $doc_file->parent_id = $model->id; // this links your picture model to the main model (like your user, or profile model)
            if ($doc_file->save()) {
                Response::send(200, $doc_file);
            } else {
                Response::send(500, "error saving file");
            }
        }
    }

    public function actionPrint($id, $preview = 0, $model = null, $return = false) {//usd for print*/
        if (isset($_POST['language']))
            Yii::app()->language = $_POST['language'];
        //Yii::app()->language='he_il';
        $this->layout = 'print';

        if (is_null($model))
            $model = $this->loadModel($id);

        if ($preview != 1)//preview
            $model->printDoc();
        if ($return)
            return $this->render('print', array('model' => $model, 'preview' => $preview,), $return);
        $this->render('print', array('model' => $model, 'preview' => $preview,));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($type = 1) {
        $type = (isset($_POST['Docs']['doctype'])) ? (int) $_POST['Docs']['doctype'] : $type;
        $model = new Docs();
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

        $model->doctype = $type;
        $model->docType = Doctype::model()->findByPk($type);
        $model->status = $model->docType->docStatus_id;
        $model->description = $model->docType->footer;
        $this->render('create', array(
            'model' => $model, //'type'=>$doctype,
        ));
    }

    private function doc($model, $mail = 0) {
        switch ($_POST['subType']) {
            case 'save':
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
                else {
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
                Yii::app()->user->setFlash('danger', 'unable to edit documenet');
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
