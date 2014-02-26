<?php

class DocsController extends RightsController
{


	public function actionView($id)	{// used in the refnum selection
		$model = Docs::model()->findByPk($id);
		
		
		//$docdetails =$model->docDetailes;
		//$doctype =$model->docType;
		
		
		$this->render('view',array(
			'model'=>$model,
		));
	}

        public function actionPdf($id,$preview=1,$model=null){//usd for print*/
            if(isset($_POST['language']))
                Yii::app()->language=$_POST['language'];
            //Yii::app()->language='he_il';
            $this->layout='print';
            
            //if(is_null($model))
                $model = Docs::model()->findByPk($id);
            
            $file=$this->render('print',array('model'=>$model,'preview'=>$preview,),true);
            
            
            $yiiBasepath=Yii::app()->basePath;
            $yiiUser=Yii::app()->user->id;
            $configPath=Yii::app()->user->settings["company.path"];
            $configCertpasswd=Yii::app()->user->certpasswd;
            
            
            
            $myPdf=$yiiBasepath."/files/".$configPath."/docs/$model->doctype-$model->docnum.pdf";
            $myPdfS=$yiiBasepath."/files/".$configPath."/docs/$model->doctype-$model->docnum-signed.pdf";

            
            // mPDF
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $mPDF1 = Yii::app()->ePdf->mpdf('', 'A5');
            $mPDF1->WriteHTML($file);
            $mPDF1->Output($myPdf,'F');
            
            //add digi sign
            spl_autoload_unregister(array('YiiBase','autoload')); 
            $oldpath=get_include_path();
            set_include_path( $yiiBasepath. '/modules/zend_pdf_certificate/');
           
            include_once('Pdf.php');
            include_once('ElementRaw.php');
            //loads a sample PDF file
            $pdf = Farit_Pdf::load($myPdf);


            $cerfile=$yiiBasepath."/files/".$configPath."/cert/".$yiiUser.".p12";
            //echo $cerfile;
            if(file_exists($cerfile)){
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
                    
            }
            set_include_path($oldpath);
            spl_autoload_register(array('YiiBase','autoload'));
            
            
            
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Type: application/pdf");
            header("Content-Disposition: attachment; filename=\"$model->doctype-$model->docnum-signed.pdf\"");
            header("Content-Transfer-Encoding: binary");
            
            readfile($myPdfS);
             
            //*/
            exit;
	}
        
        
        
        public function actionPrint($id,$preview=0,$model=null){//usd for print*/
            if(isset($_POST['language']))
                Yii::app()->language=$_POST['language'];
            //Yii::app()->language='he_il';
            $this->layout='print';
            
            if(is_null($model))
                $model = Docs::model()->findByPk($id);

            $this->render('print',array(
                    'model'=>$model,'preview'=>$preview,
            ));
	}
        
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($type=1){
		$type=(isset($_POST['Docs']['doctype']))? (int)$_POST['Docs']['doctype']:$type;
		$model=new Docs();
		
		$model->doctype=$type;
                $model->docType=Doctype::model()->findByPk($type);
                $model->status=$model->docType->docStatus_id;
		//$doctype =$model->docType;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Docs'])){
			$model->attributes=$_POST['Docs'];
                        
                        
                        if(isset($_POST['Docdetails'])) $model->docDet=$_POST['Docdetails'];
                        if(isset($_POST['Doccheques'])) $model->docCheq=$_POST['Doccheques'];
                        
                        //if($_POST['subType']!='preview'){
                        switch ($_POST['subType']) {
                            case 'save':
                                if($model->save())
                                        $this->redirect(array('admin'));
                                  return;
                                  break;
                            case 'print':
                                if($model->save())
                                        $this->actionPrint($model->id, 0, $model);
                                        //$this->redirect(array('update','id'=>$model->id));
                                return;
                                break;
                            case 'preview':
                                $this->actionPrint($model->id, 1, $model);
                                return;
                                break;
                            case 'email':
                                //$this->actionPrint($model->id,  $model);
                                return;
                                break;
                            case 'pdf':
                                $this->actionPdf($model->id);
                                return;
                                break;
                        }
                        
		}
		
		
		$this->render('create',array(
			'model'=>$model,//'type'=>$doctype,
		));
	}

	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id){
		$id=(int)$id;
		$model=$this->loadModel($id);

			
		$docdetails =$model->docDetailes;
		$doctype =$model->docType;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($model->docStatus))
                    if($model->docStatus->looked){
                            $this->redirect(array('view','id'=>$model->id));
                    }
		if(isset($_POST['Docs'])){
			$model->attributes=$_POST['Docs'];
			
			if(isset($_POST['Docdetails'])) $model->docDet=$_POST['Docdetails'];
                        if(isset($_POST['Doccheques'])) $model->docCheq=$_POST['Doccheques'];
                        //echo $_POST['subType'];
                        //exit;
                        switch ($_POST['subType']) {
                            case 'save':
                                if($model->save())
                                        $this->redirect(array('admin'));
                                  return;      
                                  break;
                            case 'print':
                                if($model->save())
                                        $this->redirect(array('print','id'=>$model->id));
                                        //$this->redirect(array('update','id'=>$model->id));
                                return;
                                break;
                            case 'preview':
                                $this->actionPrint($model->id, 1, $model);
                                return;
                                break;
                            case 'email':
                                //$this->actionPrint($model->id,  $model);
                                return;
                                break;
                            case 'pdf':
                                $this->actionPdf($model->id);
                                return;
                                break;
                        }
		}
		

		
		$this->render('update',array(
			'model'=>$model,'type'=>$doctype,
		));
	}

        
    public function actionDuplicate($id,$type=null){
		$id=(int)$id;
		$model=$this->loadModel($id);

		if(!is_null($type)) $model->doctype=(int)$type;
                $model->refnum=$id;
                $model->status=$model->docType->docStatus_id;//switch status back to defult for doc
                
		//$docstatus =Docstatus::model()->findByPk($model1->status);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		/*if(isset($docstatus))
                    if($docstatus->looked){
                            $this->redirect(array('view','id'=>$model->id));
                    }*/
		if(isset($_POST['Docs'])){
			
			$this->actionCreate(0);
		}
		

		
		$this->render('create',array(
			'model'=>$model,'type'=>$model->docType,
		));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	/*public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}*/

	/**
	 * Lists all models.
	 */
	public function actionIndex(){
		$dataProvider=new CActiveDataProvider('Docs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin(){
                //unset(Yii::app()->request->cookies['date.from']);  // first unset cookie for dates
                //unset(Yii::app()->request->cookies['date.to']);
            
		$model=new Docs('search');
		$model->unsetAttributes();  // clear any default values
                $vl='docs-grid';
                
               /* if(!empty($_POST)){
                    Yii::app()->request->cookies['issue_from'] = new CHttpCookie('date_from', $_POST['date_from']);  // define cookie for from_date
                    Yii::app()->request->cookies['issue_to'] = new CHttpCookie('date_to', $_POST['date_to']);
                    
                }
                if(!empty(Yii::app()->request->cookies['issue_from']))
                    $model->issue_from = Yii::app()->request->cookies['issue_from'];
                else {
                    $model->issue_from =date(Yii::app()->locale->getDateFormat('phpshort'));
                }
                if(!empty(Yii::app()->request->cookies['issue_to']))
                    $model->issue_to = Yii::app()->request->cookies['issue_to'];
                else{
                    $model->issue_to =date(Yii::app()->locale->getDateFormat('phpshort'));
                }*/
                
		if(isset($_POST['Docs']))
			$model->attributes=$_POST['Docs'];
                if(Yii::app()->request->isAjaxRequest && isset($_POST['ajax']) && $_POST['ajax'] === $vl) {
                    // Render partial file created in Step 1
                    $this->renderPartial('_list', array(
                      //'subscriberActiveDataProvider' => $subscriberActiveDataProvider,
                      'model' => $model,
                    ));
                    Yii::app()->end();
                  }
                
                
                
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Docs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='docs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
