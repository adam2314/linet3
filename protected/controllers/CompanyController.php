<?php

class CompanyController extends RightsController
{
	public $defaultAction = 'index';


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionIndex()
	{
            //$model=  Company::model()->findByPk(1);
            //print_r($model->Level);
            //exit;
            $model=new Company('search');
		$model->unsetAttributes();  // clear any default values
                //$model->
		//if(isset($_GET['Company']))
		//	$model->attributes=$_GET['Company'];
                if(isset($_Post['Company'])){
                    //setdatabase
                    //redirect
                    
                }
            
		$this->render('index',array(
			'model'=>$model,
		));
	}

	

}
  