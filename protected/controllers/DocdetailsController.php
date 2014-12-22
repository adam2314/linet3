<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class DocdetailsController extends RightsController
{
	
    
    
    public function actionCalc(){
        $model=new Docdetails;
        
        if(isset($_POST['Docdetails']['line'])){
            $i=$_POST['Docdetails']['line'];
            $model->attributes=$_POST['Docdetails'][$i];
            
            if(isset($_POST['CalcPriceWithVat']))
                Response::send(200,$model->CalcPriceWithVat());
            
            if(isset($_POST['CalcPriceWithOutVat']))
                Response::send(200,$model->CalcPriceWithOutVat());
            
            
            Response::send(200,$model->CalcPrice());
        }
    }
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Docdetails::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='docdetails-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
