<?php

class DataController extends RightsController{
	public function actionBackup()	{
            
            
            //if(isset($_POST['name'])){
                //Yii::import('ext.dumpDB.dumpDB');
                $dumper = new dbDump();
                echo $dumper->getDump(false);
                Yii::app()->end();
           // }
            $this->render('backup',array(
                    //'model'=>$this->loadModel($id),
            ));
	}
        
        public function actionRestore(){
            
        }
        

}
?>
