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
                $model->attributes = $_POST['FormBackupFile'];
                $model->file = CUploadedFile::getInstance($model,'file');
                if($model->file->saveAs($this->path . $model->file)){
                        // redirect to success page
                    
                        if (file_exists($sqlFile)){
                            $sqlArray = file_get_contents($sqlFile);

                             //if DROP TABLE IF EXISTS `

                            //if CREATE TABLE `


                            //INSERT INTO `

                            $cmd = Yii::app()->db->createCommand($sqlArray);
                            try{
                                    $cmd->execute();
                            }
                            catch(CDbException $e){
                                    $message = $e->getMessage();
                            }

                        }
                    
                    
                        $this->redirect(array('index'));
                }
                
            }
            
            
            //read file
            
            //if DROP TABLE IF EXISTS `
            
            //if CREATE TABLE `
            
            
            //INSERT INTO `
            
            
            
            
            
            
            
            
                
                $this->render('backupRestore',array('model'=>$model));
        }
        

}
?>
