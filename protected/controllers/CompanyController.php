<?php

class CurratesController extends RightsController
{
	public $defaultAction = 'index';


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionIndex()
	{
		$this->render('index',array(
			//'model'=>$this->loadModel($id),
		));
	}

	

}
  