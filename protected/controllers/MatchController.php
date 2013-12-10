<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MatchController
 *
 * @author adam
 */
class MatchController extends RightsController {
    public function actionIntmatch(){
        $model=new FormIntmatch('search');
        
        
        if(isset($_POST['FormIntmatch'])){
            $model->attributes=$_POST['FormIntmatch'];
            //if(){
            $this->performAjaxValidation($extmatch);
            
                Yii::app()->user->setFlash('success', Yii::t('app','Mach Success'));
            //}
            
        }

        $this->render('intmatch',array(
                'model'=>$model,
        ));
        
    }
    
    
     public function actionExtmatchajax(){
            
            $model=new Transactions('search');
            $model1=new Transactions('search');
            
            
            
            $model->unsetAttributes();
            $model1->unsetAttributes();
            if(isset($_POST['FormIntmatch'])){
                    $model->attributes=$_POST['FormIntmatch'];
                    $model1->attributes=$_POST['FormIntmatch'];
            }
            $this->renderPartial('intmatchajax',array('model'=>$model, 'model1'=>$model1  ));
    }
    
    protected function performAjaxValidation($model){
            if(isset($_POST['ajax']) && $_POST['ajax']==='intmatch-form'){
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }
	}
}
