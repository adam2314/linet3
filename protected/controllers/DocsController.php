<?php

class DocsController extends RightsController
{


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)	{
		$model = Docs::model()->findByPk($id);
		
		
		//$docdetails =$model->docDetailes;
		//$doctype =$model->docType;
		
		
		$this->render('view',array(
			'model'=>$model,
		));
	}

        
        public function actionPrint($id)	{
            $this->layout='print';
//$this->render('pages/about');
            
            
		$model = Docs::model()->findByPk($id);

		$this->render('print',array(
			'model'=>$model,
		));
	}
        
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($type=1){
		
		$model=new Docs;
		$type=(isset($_POST['Docs']['doctype']))? (int)$_POST['Docs']['doctype']:$type;
		$model->doctype=$type;
                $model->status=$model->docType->docStatus_id;
		$doctype =$model->docType;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Docs'])){
			$model->attributes=$_POST['Docs'];
                        if(isset($_POST['Docdetails'])) $model->docDet=$_POST['Docdetails'];
                        if(isset($_POST['Doccheques'])) $model->docCheq=$_POST['Doccheques'];
                        
                        
			if($model->save())
                                //print 'saved';
				//$this->redirect(array('view','id'=>$model->id));
                                $this->redirect(array('update','id'=>$model->id));
		}
		
		
		$this->render('create',array(
			'model'=>$model,'type'=>$doctype,
		));
	}

	
	public function actionStatus($id,$newstatus){
		
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
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
                        
			if($model->save()){
                                $this->redirect(array('update','id'=>$model->id));
				//$this->redirect(array('view','id'=>$model->id));
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
	public function actionAdmin()
	{
		$model=new Docs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Docs']))
			$model->attributes=$_GET['Docs'];

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
