<?php

class CompanyController extends RightsController{// //RightsController
    public $defaultAction = 'index';
    public $layout='//layouts/clean';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionIndex(){
        if(isset($_POST['Company'])){
            //if has access
            $database= Company::model()->findByPk((int)$_POST['Company']);
            Yii::log((int)$_POST['Company'],'info','app');
            Yii::app()->user->setState('Database',$database );
            Yii::app()->user->setState('Company',$database->id);
            
            Company::model()->select((int)$_POST['Company']);
           
            
            //redirect
            Yii::app()->end();

        }

        if(Yii::app()->user->Company!=0){
            Yii::app()->user->setState('Company',0);
            Yii::app()->user->Company=0;

            $this->redirect('company');
            Yii::app()->end();
        }

        $model=new Company('search');
        $model->unsetAttributes();  // clear any default values
        $this->render('index',array('model'=>$model,));
    }

    public function actionAdmin(){//only admin

        if(isset($_POST['Company'])){
            //if has access
            $database= Company::model()->findByPk((int)$_POST['Company']);
            Yii::log((int)$_POST['Company'],'info','app');
            Yii::app()->user->setState('Database',$database );
            Yii::app()->user->setState('Company',$database->id);
            //redirect

            Yii::app()->end();

        }

        if(Yii::app()->user->Company!=0){
            Yii::app()->user->setState('Company',0);
            //Yii::app()->user->Company=0;

            //$this->redirect('company');
            //Yii::app()->end();
        }

        $model=new Company('search');
        $model->unsetAttributes();  // clear any default values
        $this->render('admin',array('model'=>$model,));
    }


    public function actionDelete($id){//only admin
        if(Yii::app()->request->isPostRequest)
            {
                // we only allow deletion via POST request
                $model=$this->loadModel($id);
                
                $model->delete();
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                //if(!isset($_GET['ajax']))
                        //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
            else
            {
                throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
            }
			
    }


    public function actionCreate(){//only admin
            $model=new Company;
            $model->string=Yii::app()->dbMain->connectionString;
            $model->user=Yii::app()->dbMain->username;
            $model->password=Yii::app()->dbMain->password;
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $model->prefix=substr(str_shuffle($chars),0,4)."_";


            if($model->save()){
                $database= Company::model()->findByPk($model->id);
                Yii::app()->user->setState('Database',$database );
                Yii::app()->user->setState('Company',$model->id);
                 //redierct to settings.
                $this->redirect(array('settings/admin')); 
            }

            $this->render('create',array(
                    'model'=>$model,
            ));
    }

    public function actionDeletePermission($id){//only admin
        $model= DatabasesPerm::model()->findByPk($id);
            if($model===null){
                
            }else{
                $database_id=$model->database_id;
                $model->delete();
                $this->redirect(array('company/permissions/id/'.$database_id)); 
            }
    }
    
    
    public function actionPermissions($id){
        //$model=  DatabasesPerm::model()->findByPk($id);
        $model=new DatabasesPerm('search');
        $model->unsetAttributes();  // clear any default values
        $model->database_id=$id;
        $user=new DatabasesPerm;
        $user->database_id=$id;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['DatabasesPerm'])){
            $user->attributes=$_POST['DatabasesPerm'];
            $user->save();
            //if($model->save())
            //    $this->redirect(array('index'));
        }

        $this->render('permissions',array(
                'model'=>$model,
                'user'=>$user,
        ));
    }




    public function actionUpdate($id){//only admin
            $model=$this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Company'])){
                    $model->attributes=$_POST['Company'];
                    if($model->save())
                            $this->redirect(array('index'));
            }

            $this->render('update',array(
                    'model'=>$model,
            ));
    }


    public function loadModel($id){
            $model= Company::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
            return $model;
    }
}
  