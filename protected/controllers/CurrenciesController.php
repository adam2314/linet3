<?php

class CurrenciesController extends RightsController
{
	
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAutocomplete($term='') {
	    $res =array();
	 
	    
        $qtxt ="SELECT id as value,name as label FROM {{currencies}} WHERE name LIKE :term";
        $command =Yii::app()->db->createCommand($qtxt);
        $command->bindValue(":term", '%'.$term.'%', PDO::PARAM_STR);
        //$command->bindValue(":prefix", $this->prefix, PDO::PARAM_STR);
       // $command->bindValue(":type", $type, PDO::PARAM_STR);
        
        $res =$command->queryAll();
	    
	 
	    echo CJSON::encode($res);
	    Yii::app()->end();//*/
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}