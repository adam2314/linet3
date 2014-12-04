<?php

class DepositController extends RightsController{
  
    public function actionAdmin(){
		$model=new FormDeposit('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['FormDeposit'])){
			$model->attributes=$_POST['FormDeposit'];
                        
                        $this->performAjaxValidation($model);
                        
                        if($model->save())
				Yii::app()->user->setFlash('success', Yii::t('app','Deposit Success'));
                }
                $cheques=new Doccheques('search');
                $cheques->unsetAttributes();
                $cheques->bank_refnum='';
                
                
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