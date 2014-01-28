<?php

class BankbookController extends RightsController{
    
    
    
    public function actionAdmin(){
		$model=new Bankbook('search');
		$model->unsetAttributes();  // clear any default values
		//if(isset($_POST['Bankbook']))
		//	$model->attributes=$_GET['Currates'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
    public function actionAjax(){
            $model=new Bankbook('search');
            $model->unsetAttributes();
            //$model->account_id=$account_id;
            if(isset($_POST['Bankbook']))
                    $model->attributes=$_POST['Bankbook'];
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
    
}
