<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

namespace app\controllers;

use Yii;
use app\components\RightsController;
class CurrenciesController extends RightsController
{
	
	public function actionIndex()
	{
		return $this->render('index');
	}

        public function actionAutocomplete() {
            $term = trim($_GET['term']) ;

            if($term !='') {
                // Note: Users::usersAutoComplete is the function you created in Step 2
                $cur = Currecies::AutoComplete($term);
                echo \yii\helpers\Json::encode($cur);
                Yii::$app->end();
            }
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