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
                //echo Yii::app()->request->isAjaxRequest;
                //exit;
                if(isset($_POST['Transactions']))
			$model->attributes=$_POST['Transactions'];
                if(Yii::app()->request->isAjaxRequest || isset($_POST['ajax']) && $_POST['ajax'] === $vl) {
                    
                    
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
        
        
        public function actionVat(){
            $model=new ReportVat();

            if(isset($_POST['ReportVat'])){
                $model->attributes=$_POST['ReportVat'];
                if($model->step==1){
                    
                    $model->pay();
                    
                    
                }
                
                $model->step=1;
                   
                $last = 31;   
                while(!checkdate($model->to_month, $last, $model->year)) {
                        $last--;
                }
                
                if(strlen($model->from_month)==1)
                    $model->from_month="0{$model->from_month}";
                if(strlen($model->to_month)==1)
                    $model->to_month="0{$model->to_month}";
                
                $model->from_date="01/{$model->from_month}/{$model->year} 00:00:00";
                $model->to_date="$last/{$model->to_month}/{$model->year} 23:59:59";
                
                $model->calcPay();
                
                $this->renderPartial('vat_preview', array('model' => $model,));
                Yii::app()->end();
              }
            
            
            $model->year=date('Y');
            $model->from_month=date('m');
            $model->to_month=date('m');
            
            $this->render('vat',array('model'=>$model));
            
        }
}
