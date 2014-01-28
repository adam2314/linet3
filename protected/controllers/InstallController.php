<?php

class InstallController extends Controller {
	public $layout='//layouts/noMenu';
        
        
	public function actionIndex($step=0) {
            
            if(isset($_POST['InstallConfig'])){
                    $model=new InstallConfig();
                    $model->attributes=$_POST['InstallConfig'];
                    $model->make();
            }
             if(isset($_POST['InstallUser'])){//need to check for users!
                    $model=new InstallUser();
                    $model->attributes=$_POST['InstallUser'];
                    $model->make();
            }
            
            
            
            
            if($step==0){//pre
                $model=new InstallPre();
		$this->render('Pre',array('model'=>$model));
                
            }
            
            if($step==1){//recheck
                $model=new InstallPre();
		
                $this->renderPartial('Pre',array('model'=>$model ));
            }
            if($step==2){//config
                $model=new InstallConfig();
                $this->renderPartial('config',array('model'=>$model ));
		
            }
            if($step==3){//user
                $model=new User();
                $this->renderPartial('user',array('model'=>$model ));
		
            }
            if($step==4){//finsih
                Yii::app()->request->redirect('company/index');
                //$model=new InstallConfig();
                //$this->renderPartial('config',array('model'=>$model ));
		
            }
            //*/
            
	}
        
}