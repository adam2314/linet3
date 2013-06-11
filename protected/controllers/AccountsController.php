<?php

class AccountsController extends RightsController
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionTransaction($id=200){
		$transactions= new Transaction('search');
		$transactions->account_id=$id;
		$this->render('transaction',array('model'=>$transactions,));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Accounts;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Accounts']))
		{
			$model->attributes=$_POST['Accounts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->num));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)//$prefix
	{
		//print 'in action';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Accounts']))
		{
			$model->attributes=$_POST['Accounts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->num));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id){
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			//$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function actionAutocomplete($type=0,$term='') {
	    $res =array();
	 
	    
	        $qtxt ="SELECT id as value,company as label FROM {{accounts}} WHERE company LIKE :term AND type=:type";
	        $command =Yii::app()->db->createCommand($qtxt);
	        $command->bindValue(":term", '%'.$term.'%', PDO::PARAM_STR);
	        //$command->bindValue(":prefix", $this->prefix, PDO::PARAM_STR);
	        $command->bindValue(":type", $type, PDO::PARAM_STR);
	        
	        $res =$command->queryAll();
	    
	 
	    echo CJSON::encode($res);
	    Yii::app()->end();//*/
	}
	
	public function actionJSON($id=0){
		//$this->
		//$model=new Accounts('search');
		//$model->id=$id;
		$model=Accounts::model()->findByPk($id);
    	//$params =array( 'model'=>$model,   );//array('dataProvider'=>$dataProvider,)
		//$this->renderPartial('ajax',$params);
		 echo CJSON::encode($model);
	    Yii::app()->end();//*/
	}
	
	public function actionAjax($type=10){
		//$this->
		$model=new Accounts('search');
		$model->type=$type;

    	$params =array( 'model'=>$model,   );//array('dataProvider'=>$dataProvider,)
		$this->renderPartial('ajax',$params);
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex($type=10)
	{
		//print "bla".$type."bla";
		//$this->type=$type;
		$dataProvider=new CActiveDataProvider('Accounts',
			array(
			'criteria'=>array(
				'condition'=>'type= :type',
				'params'=>array(':type'=>$type),
			
				//'order'=>'num DESC',
        		//'with'=>array('author'),
    			)
    		)
    	);
		$this->render('index');//,array('dataProvider'=>$dataProvider)
	}

	/**
	 * Manages all models.
	 */
	/*public function actionAdmin()
	{
		$model=new Accounts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Accounts']))
			$model->attributes=$_GET['Accounts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	//public $prefix ='40f26e6e5928a9756309e91c6368d8f745f8ff8c';
	//public $type='1';
	public function loadModel($id)
	{
		//$model=Accounts::model()->findByPk($id);
		$model=Accounts::model()->findByPk($id);

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
		if(isset($_POST['ajax']) && $_POST['ajax']==='accounts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
