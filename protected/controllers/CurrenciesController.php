<?php

class CurrenciesController extends RightsController
{
	
	public function actionIndex()
	{
		$this->render('index');
	}

        public function actionAutocomplete() {
            $term = trim($_GET['term']) ;

            if($term !='') {
                // Note: Users::usersAutoComplete is the function you created in Step 2
                $cur = Currecies::AutoComplete($term);
                echo CJSON::encode($cur);
                Yii::app()->end();
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