<?php

class TransactionController extends RightsController{
    
    public function actionCreate(){
        $model=new Transactions();
        
        if(isset($_POST['Transactions'])){
                //$_POST['Currates']["date"]="CURRENT_TIMESTAMP";
                //unset($_POST['Transactions']["date"]);
                $line=1;
                $model->attributes=$_POST['Transactions'];
                //print_r($model->attributes);
                //print_r($_POST['Transactions']);
                //$this->account_id
                        
                if(isset($_POST['sourcepos']) && (float)$_POST['sourcepos']!=0)
                    $model->sum=$_POST['sourcepos'];
                else 
                    $model->sum=$_POST['sourceneg']*-1;
                
                //$model->sum=$docdetail->price*$action;
                $model->owner_id=Yii::app()->user->id;
                $model->linenum=$line;
                $line++;
                if($model->save()){
                    //save subs
                    //$line++;
                    $this->redirect(array('create'));


                }
        }
        
        $this->render('create',array(
			'model'=>$model,
		));
    }
    
    
}