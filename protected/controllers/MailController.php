<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailController
 *
 * @author adam
 */
class MailController extends RightsController{
    
    
    
    public function actionCreate($id)	{
		$model=new MailForm;
                
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['MailForm']))		{
			$model->attributes=$_POST['MailForm'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
    //put your code here
}
