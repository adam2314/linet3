<?php

class UsersController extends RightsController
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
                $model->scenario ='create';
                $userincomemap =$model->userIncomeMaps;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['User'])){
			$model->attributes=$_POST['User'];
                        if(isset($_POST['UserIncomeMap'])){
                            foreach($_POST['UserIncomeMap'] as $key=>$detial){
				$saved=false;
				foreach($userincomemap as $num=>$submodel){
					if($submodel->itemVatCat_id==$detial['itemVatCat_id']){//update lines
						unset($userincomemap[$num]);
						$submodel->attributes=$detial;
						$submodel->user_id=$model->id;//adam:
						if(!$submodel->save()){
							echo "fatel error cant save doc detial";
						}else{
							$saved=true;

						}
					}
				}//*/
				if(!$saved){//new line
					//unset($detial['id']);
					$detial['user_id']=$model->id;
					
					
					$submodel=new Docdetails;	
					$submodel->attributes=$detial;
					
					if($submodel->save()){
						$saved=true;
					}else{
						echo "fatel error cant save doc detial";
					}
						
				}
				
			}
                        }
                        
			if(count($userincomemap)!=0)//if more items in $docdetails delete them
				foreach ($userincomemap as $userincome)
					$userincome->delete();
			
                        
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $userincomemap =$model->userIncomeMaps;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
                        if(isset($_POST['UserIncomeMap'])){
                            foreach($_POST['UserIncomeMap'] as $key=>$detial){
                                   $saved=false;
                                   foreach($userincomemap as $num=>$submodel){
                                           if($submodel->itemVatCat_id==$detial['itemVatCat_id']){//update lines
                                                   unset($userincomemap[$num]);
                                                   $submodel->attributes=$detial;
                                                   $submodel->user_id=$model->id;//adam:
                                                   if(!$submodel->save()){
                                                           echo "fatel error cant save doc detial";
                                                   }else{
                                                           $saved=true;

                                                   }
                                           }
                                   }//*/
                                   if(!$saved){//new line
                                           //unset($detial['id']);
                                           $detial['user_id']=$model->id;


                                           $submodel=new Docdetails;	
                                           $submodel->attributes=$detial;

                                           if($submodel->save()){
                                                   $saved=true;
                                           }else{
                                                   echo "fatel error cant save doc detial";
                                           }

                                   }

                           }
                        }
			if(count($userincomemap)!=0)//if more items in $docdetails delete them
				foreach ($userincomemap as $userincome)
					$userincome->delete();
			
                        
                        
                        
                        
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
	public function actionDelete($id)
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
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

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
		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
