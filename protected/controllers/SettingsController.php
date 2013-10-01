<?php

class SettingsController extends RightsController
{


	public function actionAdmin()	{/* used in the refnum selection*/
		$models = Settings::model()->findAll();
		
		
		//$docdetails =$model->docDetailes;
		//$doctype =$model->docType;
		
		
		$this->render('view',array(
			'models'=>$models,
		));
	}

        
       
}