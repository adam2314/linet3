<?php

class DataController extends RightsController{//
	public function actionBackup($id=null)	{
            if($id==null){
                $id=Yii::app()->user->Company;
            }
            $comp=  Company::model()->findByPk($id);//chkAccess
            $comp->backup();
            
            //if(isset($_POST['name'])){
                //Yii::import('ext.dumpDB.dumpDB');
                //$dumper = new dbDump();
                //echo $dumper->getDump(true);
                //Yii::app()->end();
           // }
            $this->render('backup',array(
                    //'model'=>$this->loadModel($id),
            ));
	}
        
        public function actionRestore(){
            $model = new FormBackupFile;
            
            if(isset($_POST['FormBackupFile'])){
                //$yiiUser=Yii::app()->user->id;
                $configPath=Yii::app()->user->settings["company.path"];
     
                $mysql = Yii::app()->params["filePath"].$configPath."/tmp.sql";
                
                $model->file = $_POST['FormBackupFile']['file'];
                $model->file = CUploadedFile::getInstance($model,'file');
                if($model->file->saveAs($mysql)){
                        // redirect to success page
                    
                        if (file_exists($mysql)){
                            $sqlArray = file_get_contents($mysql);

                             $src1='DROP TABLE IF EXISTS `';
                             $rplc1='DROP TABLE IF EXISTS `'.Yii::app()->db->tablePrefix;
                            //
                             $src2='CREATE TABLE `';
                             $rplc2='CREATE TABLE `'.Yii::app()->db->tablePrefix;
                            //INSERT INTO `
                            $src3='INSERT INTO `';
                            $rplc3='INSERT INTO `'.Yii::app()->db->tablePrefix;
                            
                             
                            $src4='ALTER TABLE ';
                            $rplc4='ALTER TABLE '.Yii::app()->db->tablePrefix;
                            
                            
                            $src5=') REFERENCES `';
                            $rplc5=') REFERENCES `'.Yii::app()->db->tablePrefix;
                            
                            $sqlArray=  str_replace($src1, $rplc1, $sqlArray);
                            $sqlArray=  str_replace($src2, $rplc2, $sqlArray);
                            $sqlArray=  str_replace($src3, $rplc3, $sqlArray);
                            $sqlArray=  str_replace($src4, $rplc4, $sqlArray);
                            $sqlArray=  str_replace($src5, $rplc5, $sqlArray);
                            
                            //print $sqlArray;
                            $cmd = Yii::app()->db->createCommand($sqlArray);
                            //$cmd->execute();
                            try{
                                    $cmd->execute();
                            }
                            catch(CDbException $e){
                                    $message = $e->getMessage();
                                    print $message;
                            }
                        }                                      
                        //$this->redirect(array('index'));
                }                
            }
                        
            //read file            
            //if DROP TABLE IF EXISTS `            
            //if CREATE TABLE `         
            //INSERT INTO `
                
                $this->render('backupRestore',array('model'=>$model));
        }
        
        public function actionPcn874(){
            $model= new FormReportPcn874('search');
            if(isset($_POST['FormReportPcn874'])){
                    $model->attributes=$_POST['FormReportPcn874'];
                    
                    return Yii::app()->getRequest()->sendFile("pcn874.txt", $model->make());
            }
            $this->render('pcn874',array('model'=>$model,));
        }
        
        /*
        public function actionPcn874ajax(){
            $model=new FormReportPcn874('search');
            
            $model->unsetAttributes();
            if(isset($_POST['FormReportPcn874'])){
                    $model->attributes=$_POST['FormReportPcn874'];
                    
                    return Yii::app()->getRequest()->sendFile("pcn874.txt", $model->make());
            }
            $this->renderPartial('pcn874ajax',array('model'=>$model ));
            
        }*/

        
        
        public function actionOpenfrmt(){
            $model= new FormOpenfrmt();
            if(isset($_POST['FormOpenfrmt'])){
                    $model->attributes=$_POST['FormOpenfrmt'];
                    
                    if($model->make()){
                        $this->renderPartial('openfrmtajax',array('model'=>$model ));
                        Yii::app()->end();
                    }
                    //return Yii::app()->getRequest()->sendFile("pcn874.txt", $model->make());
            }
            $this->render('openfrmt',array('model'=>$model,));
        }
        

        public function actionDownload($id){
            $id=(int)$id;
            $model=Files::model()->findByPk($id);
            if($model===null){
                    throw new CHttpException(404,'The requested page does not exist.');
            }
            //$configPath=Yii::app()->user->settings["company.path"];
            $file   = $model->getFullPath();//????.$model->id;

            
            //echo $file.'end';
            return Yii::app()->getRequest()->sendFile($model->name, file_get_contents($file));
        }
        
        
        public function actionOpenfrmtimport(){
            $model= new FormOpenfrmt();
            
            
            if(isset($_POST['SwitchType'])){
                //save current
                //$corComp=Yii::app()->user->Database->id;
                
                $newComp=(int)$_POST['companyId'];
                //company load
                Company::model()->select($newComp);
                
                foreach($_POST['SwitchType'] as $old=>$new){
                    Acctype::model()->switchType($old,$new);
                }
                
                //end
                $this->redirect('company');
            }
            if(isset($_POST['FormOpenfrmt'])){
                
                //$yiiUser=Yii::app()->user->id;
                $configPath=Yii::app()->user->settings["company.path"];
     
                $file = Yii::app()->params["filePath"].$configPath."/ini.txt";
                
                $model->iniFile = $_POST['FormOpenfrmt']['iniFile'];
                $model->iniFile = CUploadedFile::getInstance($model,'iniFile');
                if($model->iniFile->saveAs($file)){
                    $model->iniFile=$file;
                    //$model->read();
                }
                
                $file= Yii::app()->params["filePath"].$configPath."/bkmv.txt";
                $model->bkmvFile = $_POST['FormOpenfrmt']['bkmvFile'];
                $model->bkmvFile = CUploadedFile::getInstance($model,'bkmvFile');
                if($model->bkmvFile->saveAs($file)){
                    $corComp=Yii::app()->user->Database->id;
                    $model->bkmvFile=$file;
                    $model->readIni();
                    Company::model()->select($model->companyId);
                    $model->readBkmv();
                    Company::model()->select($corComp);
                }
                 $this->render('openfrmtimportajax',array('model'=>$model,));
                 
                 Yii::app()->end();
            }
            
            
            
            $this->render('openfrmtimport',array('model'=>$model,));
            //echo $model->read();
        }
        
        public function actionLinet2Import(){
            $model=new FormLinet2Import;
            if(isset($_POST['FormLinet2Import'])){
                
                $configPath=Yii::app()->user->settings["company.path"];
     
                $file = Yii::app()->params["filePath"].$configPath."/linet2.bak";
                
                $model->file = $_POST['FormLinet2Import']['file'];
                $model->file = CUploadedFile::getInstance($model,'file');
                
                if($model->file===null)
			throw new CHttpException(501,Yii::t('app','Error in request.'));//no file
                if($model->file->saveAs($file)){
                    $model->file=$file;
                    
                    $model->import();
                    //$model->read();
                }
                
                
            }
            $this->render('linet2Import',array('model'=>$model,));
            Yii::app()->end();
        }
}
?>
