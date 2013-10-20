<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class OutcomeController extends RightsController{
    public function actionCreate($type=0){
                $model=new FormOutcome();
                if($type==1){
                    $model->account_id=Yii::app()->user->settings["company.acc.payvat"];
                }
                if($type==2){
                    $model->account_id=Yii::app()->user->settings["company.acc.natinspay"];
                }
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                if(isset($_POST['FormOutcome'])){
			$model->attributes=$_POST['FormOutcome'];
                        $model->transaction();
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
}

?>
