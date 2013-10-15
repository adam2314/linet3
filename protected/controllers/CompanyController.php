<?php

class CompanyController extends RightsController
{
	public $defaultAction = 'index';


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionIndex(){
            if(isset($_POST['Company'])){
                //if has access
                $database= Company::model()->findByPk((int)$_POST['Company']);
                Yii::app()->user->setState('Database',$database );
                Yii::app()->user->setState('Company',1);
                //redirect
                
                Yii::app()->end();

            }

            if(Yii::app()->user->Company!=0){
                Yii::app()->user->setState('Company',0);
                Yii::app()->user->Company=0;

                $this->redirect('company');
                Yii::app()->end();
            }

            $model=new Company('search');
            $model->unsetAttributes();  // clear any default values
            $this->render('index',array('model'=>$model,));
	}

	

}
  