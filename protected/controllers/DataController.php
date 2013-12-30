<?php

class DataController extends RightsController{
	public function actionBackup()	{
            
            
            //if(isset($_POST['name'])){
                //Yii::import('ext.dumpDB.dumpDB');
                $dumper = new dbDump();
                echo $dumper->getDump(true);
                Yii::app()->end();
           // }
            $this->render('backup',array(
                    //'model'=>$this->loadModel($id),
            ));
	}
        
        public function actionRestore(){
            $model = new FormBackupFile;
            
            if(isset($_POST['FormBackupFile'])){
                $yiiBasepath=Yii::app()->basePath;
                $yiiUser=Yii::app()->user->id;
                $configPath=Yii::app()->user->settings["company.path"];
     
                $mysql = $yiiBasepath."/files/".$configPath."/tmp.sql";
                
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
                    
                    echo $model->make();
                    
                    exit;
                    //return Yii::app()->getRequest()->sendFile("pcn874.txt", $model->make());
            }
            $this->render('openfrmt',array('model'=>$model,));
        }
        
}
?>
