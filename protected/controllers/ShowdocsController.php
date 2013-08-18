<?php

class ShowdocsController extends RightsController
{


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$doc = Docs::model()->findByPk($id);
		
		
		$criteria=new CDbCriteria;
		$criteria->condition='doc_id=:docid';
		$criteria->params=array(':docid'=>$id);
		$docdetails =Docdetails::model()->findAll($criteria);
		$doctype =Doctype::model()->findByPk($id);
		
		
		
		
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),'type'=>$doctype,'docdetails'=>$docdetails,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($type=1)
	{
		
		$model=new Docs;
		$doctype =Doctype::model()->findByPk($type);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Docs']))
		{
			$model->attributes=$_POST['Docs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		
		$criteria=new CDbCriteria;
		$criteria->condition='doc_id=:docid';
		$criteria->params=array(':docid'=>$id);
		$docdetails =Docdetails::model()->findAll($criteria);
		$doctype =Doctype::model()->findByPk($id);
		$docstatus =Docstatus::model()->findByPk($model->status);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		//if($doctype->looked){
		if($docstatus->looked){
			$this->redirect(array('view','id'=>$model->id));
		}
		if(isset($_POST['Docs']))
		{
			$model->attributes=$_POST['Docs'];
			
			
			foreach($_POST['Docdetails'] as $key=>$detial){
				$saved=false;
				///*
				foreach($docdetails as $num=>$submodel){
					if($submodel->id==$detial['id']){//update lines
						unset($docdetails[$num]);
						//unset($_POST['Docdetails'][$key]);
						$submodel->attributes=$detial;
						$submodel->doc_id=$model->id;
						if(!$submodel->save()){
							echo "fatel error cant save doc detial";
						}else{
							$saved=true;
							//$a=$detial;
						}
					}
				}//*/
				if(!$saved){//new line
					unset($detial['id']);
					$detial['doc_id']=$model->id;
					
					
					$submodel=new Docdetails;	
					$submodel->attributes=$detial;
					
					if($submodel->save()){
						$saved=true;
					}else{
						echo "fatel error cant save doc detial";
					}
						
				}
				
			}
			if(count($docdetails)!=0)//if more items in $docdetails delete them
				foreach ($docdetails as $docdetail)
					$docdetail->delete();
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		

		
		$this->render('update',array(
			'model'=>$model,'type'=>$doctype,'docdetails'=>$docdetails,
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
	public function actionIndex()
	{
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
