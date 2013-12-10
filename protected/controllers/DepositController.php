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
                $cheques->bank_refnum=null;
                
                
		$this->render('admin',array(
			'model'=>$model,
                        'cheques'=>$cheques,
		));
	}
        
    public function actionAjax(){
            $model=new Doccheques('search');
            //$model=new Bankbook('search');
            //$model=new Docdetails('search');
            $model->bank_refnum='';
            //if(isset($_POST['Deposit']))
            //$model->attributes['bank_refnum']='';
            $this->renderPartial('ajax',array( 'model'=>$model,   ));
    }
    
    
    protected function performAjaxValidation($model){
		if(Yii::app()->getRequest()->getIsAjaxRequest()) {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}