<?php

class ConfigController extends RightsController
{


	public function actionAdmin()	{/* used in the refnum selection*/
		$models = Config::model()->findAll();
		
		
		//$docdetails =$model->docDetailes;
		//$doctype =$model->docType;
		
		
		$this->render('view',array(
			'models'=>$models,
		));
	}

        
       
}