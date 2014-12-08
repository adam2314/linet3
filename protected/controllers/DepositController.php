<?php

class DepositController extends RightsController{
  
    public function actionAdmin(){
		$model=new FormDeposit;
		//$model->unsetAttributes();  // clear any default values
                $this->performAjaxValidation($model);
		if(isset($_POST['FormDeposit'])){
			$model->attributes=$_POST['FormDeposit'];
                        
                        
                        
                        if($model->save())
				Yii::app()->user->setFlash('success', Yii::t('app','Deposit Success'));
                }
                $cheques=new Doccheques('search');
                $cheques->unsetAttributes();
                //$cheques->bank_refnum='';
                
                
		$this->render('admin',array(
			'model'=>$model,
                        'cheques'=>$cheques,
		));
	}
        
    
    protected function performAjaxValidation($model){
		if(Yii::app()->getRequest()->getIsAjaxRequest()) {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}