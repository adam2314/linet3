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
                $model->type=Yii::app()->user->settings['transactionType.manual'];        
                if(isset($_POST['sourcepos']) && (float)$_POST['sourcepos']!=0)
                    $model->sum=$_POST['sourcepos'];
                else 
                    $model->sum=$_POST['sourceneg']*-1;
                
                //$model->sum=$docdetail->price*$action;
                $model->owner_id=Yii::app()->user->id;
                $model->linenum=$line;
                $line++;
                if($model->save()){
                    foreach($_POST['ops'] as $acc){
                        $i=$line-2;
                        $submodel=new Transactions();
                        $submodel->attributes=$_POST['Transactions'];
                        $submodel->type=Yii::app()->user->settings['transactionType.manual'];
                        $submodel->num=$model->num;
                        $submodel->account_id=$acc;
                        if(isset($_POST['sumpos'][$i]) && (float)$_POST['sumpos'][$i]!=0)
                            $submodel->sum=$_POST['sumpos'][$i];
                        else 
                            $submodel->sum=$_POST['sumneg'][$i]*-1;
                        
                        $submodel->owner_id=Yii::app()->user->id;
                        $submodel->linenum=$line;
                        $submodel->save();
                        //$i
                        $line++;
                    }
                    //save subs
                    //$line++;
                    $this->redirect(array('create'));


                }
        }
        
        $this->render('create',array(
			'model'=>$model,
		));
    }
    
    
    
    public function actionOpenBalance(){
        $model=new Transactions();
        
        if(isset($_POST['account'])){
                
                $year = $_POST['year'];
                $date = "$year-01-01 00:00:01";
                $accountArr = $_POST['account'];
                $balanceArr = $_POST['bal'];
                foreach($accountArr as $index => $account) {
                    $sum = $balanceArr[$index];
                    if($account) {
                        $submodel=new Transactions();                     
                        $submodel->date=$date;
                        $submodel->details=Yii::t('app',"Opening Balance");
                        $submodel->type=Yii::app()->user->settings['transactionType.openBalance'];
                        $submodel->currency_id=Yii::app()->user->settings['company.cur'];
                        $submodel->account_id=$account;
                        $submodel->sum=$sum;
                        
                        $submodel->owner_id=Yii::app()->user->id;
                        $submodel->linenum=1;
                        $submodel->save();
                        //$submodel->num;
                        
                        
                        $submodel1=new Transactions();  
                        $submodel1->num=$submodel->num;
                        $submodel1->date=$date;
                        $submodel1->details=Yii::t('app',"Opening Balance");
                        $submodel1->type=Yii::app()->user->settings['transactionType.openBalance'];
                        $submodel1->currency_id=Yii::app()->user->settings['company.cur'];
                        $submodel1->account_id=Yii::app()->user->settings['company.acc.openbalance'];
                        $submodel1->sum=$sum*-1.0;
                        
                        $submodel1->owner_id=Yii::app()->user->id;
                        $submodel1->linenum=2;
                        $submodel1->save();
                        

                    }
                }
	


            $this->redirect(array('OpenBalance'));


            
        }
        
        $this->render('opbalance',array(
			'model'=>$model,
		));
    }
    
    
}