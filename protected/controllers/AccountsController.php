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
		$transactions= new Transactions('search');
                $transactions->unsetAttributes();
		$transactions->account_id=$id;
		$this->render('transaction',array('model'=>$transactions,));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($type=0)
	{
		$model=new Accounts($type);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Accounts']))
		{
			$model->attributes=$_POST['Accounts'];
                        $model->deleteEavAttributes();
                        if(isset($_POST['AccounteavE'])&&isset($_POST['AccounteavE'])){
                            $model->setEavAttributes(array_combine($_POST['AccounteavE'],$_POST['AccounteavV']));
                        }
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
            //Yii::app()->user->setFlash('error', 'unable to change sys account');
            //Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You successfully read this important alert message.');
            //Yii::app()->user->setFlash('info', '<strong>Heads up!</strong> This alert needs your attention, but it\'s not super important.');
            //Yii::app()->user->setFlash('warning', '<strong>Warning!</strong> Best check yo self, you\'re not looking too good.');
            //Yii::app()->user->setFlash('error', '<strong>Oh snap!</strong> Change a few things up and try submitting again.');
            
            
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Accounts']))
		{
			$model->attributes=$_POST['Accounts'];
                        if($model->system_acc==1)
                            Yii::app()->user->setFlash('error', 'unable to change sys account');
                        
                        else{
                            $model->deleteEavAttributes();
                            if(isset($_POST['AccountseavE'])&&isset($_POST['AccountseavE'])){
                                $model->setEavAttributes(array_combine($_POST['AccountseavE'],$_POST['AccountseavV']));
                            }
                            if($model->save())
                                $this->redirect(array('view','id'=>$model->id));
                        }
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
                $model=$this->loadModel($id);
                //echo $model->system_acc;
                if($model->system_acc==1){
                            Yii::app()->user->setFlash('error', "unable to delete sys account");
                            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
                }
		elseif(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
                
	}
	
	public function actionAutocomplete($type=0,$term='') {
	    $res =  Accounts::AutoComplete($term,$type);
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
