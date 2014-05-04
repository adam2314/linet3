<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class fileRecord extends basicRecord{
    public $Files=null;
    
    private function findFiles(){
        $this->Files=Files::model()->findByAttributes(array('parent_type'=>'Docs','parent_id'=>$this->id));
    }
    
    
    public function afterFind(){
        $this->findFiles();
        return parent::afterFind();
    }
    public function save($runValidation = true, $attributes = NULL) {
        $class=get_class($this);
        if($class=='Accounts')
            if(Accounts::model()->findByPk($this->id)){
                $this->isNewRecord=false;
            }
        $a=parent::save($runValidation,$attributes);
        if($a){
            //if (isset($_POST['Files'])) {
                //$this->attributes = $_POST['Files'];
                $tmps = CUploadedFile::getInstancesByName('Files');
                // proceed if the images have been set
                if (isset($tmps) && count($tmps) > 0) {
                    // go through each uploaded image
                    $yiiBasepath=Yii::app()->basePath;
                    $configPath=Yii::app()->user->settings["company.path"];
                    
                    
                    foreach ($tmps as $image => $pic) {
                        $img_add = new Files();
                        $img_add->name = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                        $img_add->path="files/";
                        $img_add->parent_type=get_class($this);
                        $img_add->parent_id = $this->id; // this links your picture model to the main model (like your user, or profile model)

                        $img_add->save(); // DONE
                        
                        if ($pic->saveAs($yiiBasepath."/files/".$configPath."/files/".$img_add->id)) {
                            // add it to the main model now
                            
                        }
                        else{
                            echo 'Cannot upload!';
                        }
                    }
                //}
            
            }
        }//endFile
        
        
        
        
        
        return $a;
    }
    
}
