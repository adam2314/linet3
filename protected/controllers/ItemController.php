<?php

class ItemController extends RightsController
{
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model= Item::model()->findByPk($id);

		$this->render('view',array(
			'model'=>$model,
		));
	}
        public function actionTemplate(){
            $model=new Item;
            
            $cat=CHtml::listData(Itemcategory::model()->findAll(), 'id', 'name');
            $units=CHtml::listData(Itemunit::model()->findAll(), 'id', 'name');
            $this->render('create',array(
			'model'=>$model,
			'cat'=>$cat,
			'units'=>$units,
		));
        }


        public function actionJSON($id=0){
		$model=Item::model()->findByPk($id);

                 //adam: there is a bug with the public property vat in the framework  Issue 1385 (WontFix)
                
                echo CJSON::encode(array(CJSON::encode($model),     json_encode($model)));
	    Yii::app()->end();//*/
	}
	
	
	public function actionAutocomplete($term='') {
	    $res =  Item::AutoComplete($term);
	    echo CJSON::encode($res);
	    Yii::app()->end();//*/
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Item;
                //$model->unsetAttributes();  // clear any default values
				//print Yii::app()->user->getState('company');
				//die;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Item']))
		{
			$model->attributes=$_POST['Item'];
			if($model->save())
				//$model->pic->saveAs('/to/localFile');
				$this->redirect(array('view','id'=>$model->id));
		}

		$cat=CHtml::listData(Itemcategory::model()->findAll(), 'id', 'name');
		$units=CHtml::listData(Itemunit::model()->findAll(), 'id', 'name');
		$model->parent_item_id=0;
		$this->render('create',array(
			'model'=>$model,
			'cat'=>$cat,
			'units'=>$units,
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

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		//$model->setEavAttributes(array('attribute1' => 'value1', 'attribute2' => 'value2'));

		if(isset($_POST['Item']))
		{
			$model->attributes=$_POST['Item'];
			$model->deleteEavAttributes();
                        if(isset($_POST['ItemeavE'])&&isset($_POST['ItemeavE'])){
                            $model->setEavAttributes(array_combine($_POST['ItemeavE'],$_POST['ItemeavV']));////saveEavAttributes
                        }
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$cat=CHtml::listData(Itemcategory::model()->findAll(), 'id', 'name');
		$units=CHtml::listData(Itemunit::model()->findAll(), 'id', 'name');
		
		$this->render('update',array(
			'model'=>$model,
			'cat'=>$cat,
			'units'=>$units,
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
		$dataProvider=new CActiveDataProvider('Item');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Item('search');
		$model->unsetAttributes();  // clear any default values
                
                
                $vl='item-grid';
		if(isset($_POST['Item']))
			$model->attributes=$_POST['Item'];
                if(isset($_GET['ajax']) && $_GET['ajax'] === $vl) {
                    // Render partial file created in Step 1
                    $this->renderPartial('_ajax', array(
                      //'subscriberActiveDataProvider' => $subscriberActiveDataProvider,
                      'model' => $model,
                    ));
                    Yii::app()->end();
                  }
                
                
                
		//if(isset($_GET['Item']))
		//	$model->attributes=$_GET['Item'];

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
		$model=Item::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
