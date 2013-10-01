<?php

class ReportsController extends RightsController
{
	/**
	 * Declares class-based actions.
	 */
	
	
	public function actionJournal()	{
                $model= new Transactions('search');
                $model->unsetAttributes();
                $vl='transactions-grid';
                
                if(isset($_POST['Transactions']))
			$model->attributes=$_POST['Transactions'];
                if(Yii::app()->request->isAjaxRequest && isset($_POST['ajax']) && $_POST['ajax'] === $vl) {
                    // Render partial file created in Step 1
                    $this->renderPartial('journal', array(

                      'model' => $model,
                    ));
                    Yii::app()->end();
                  }
                
                
                
		$this->render('journal',array('model'=>$model,));

	}
	public function actionOwe(){
            $model= new Accounts('search');
            $model->unsetAttributes();
            $model->type=0;//could be dynamic
            
            $this->render('owe',array('model'=>$model,));
            
        }
}
