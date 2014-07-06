<?php

class BankbookController extends RightsController{
    
    public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){
		$model=new Bankbook;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bankbook'])){
			$model->attributes=$_POST['Bankbook'];
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
	public function actionUpdate($id){
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bankbook']))
		{
			$model->attributes=$_POST['Bankbook'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		if(Yii::app()->request->isPostRequest){
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
    
    public function actionAdmin(){
		$model=new Bankbook('search');
		$model->unsetAttributes();  // clear any default values
                //
                //
		if(isset($_POST['Bankbook']['file'])){
                    
			$model->import((int)$_POST['Bankbook']['account_id']);
                        //Yii::app()->end();
                }

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
    public function actionAjax(){
            $model=new Bankbook('search');
            $model->unsetAttributes();
            //$model->account_id=$account_id;
            if(isset($_POST['Bankbook'])){
                    $model->attributes=$_POST['Bankbook'];
                    
            }
            $this->renderPartial('ajax',array( 'model'=>$model,   ));
    }
    
        
    public function actionExtmatch(){
        $extmatch=new FormExtmatch('search');
        $model=new Bankbook('search');
        $model->unsetAttributes();  // clear any default value
        
        if(isset($_POST['FormExtmatch'])){
            $extmatch->attributes=$_POST['FormExtmatch'];
            //if(){
            $this->performAjaxValidation($extmatch);
            
                Yii::app()->user->setFlash('success', Yii::t('app','Mach1 Success'));
            //}
            //Yii::app()->user->setFlash('success', Yii::t('app','Mach2 Success'));
            
        }

        $this->render('extmatch',array(
                'model'=>$model,'extmatch'=>$extmatch,
        ));
        
    }
    
    
     public function actionExtmatchajax(){
            
            $model=new Bankbook('search');
            $trans=new Transactions('search');
            
            
            
            $model->unsetAttributes();
            $trans->unsetAttributes();
            //$model->account_id=$account_id;
            if(isset($_POST['FormExtmatch'])){
                    $model->attributes=$_POST['FormExtmatch'];
                    $trans->attributes=$_POST['FormExtmatch'];
            }
            $this->renderPartial('extmatchajax',array('model'=>$model, 'trans'=>$trans  ));
    }
    
    protected function performAjaxValidation($model){
            //$model=new FormExtmatch('search');
            if(isset($_POST['ajax']) && $_POST['ajax']==='extmatch-form'){
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }
	}
        
        
        public function loadModel($id)
	{
		$model=  Bankbook::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	
    
}
