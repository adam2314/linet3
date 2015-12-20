<?php

/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\components;
use yii;
use app\components\basicRecord;
use app\models\Files;
class fileRecord extends basicRecord{
    public $Files=null;
    
    private function findFiles(){
        $this->Files=Files::findAll(['parent_type'=>'Docs','parent_id'=>$this->id]);
    }
    
    
    public function afterFind(){
        $this->findFiles();
        return parent::afterFind();
    }
    public function save($runValidation = true, $attributes = NULL) {
        $class=get_class($this);
        if($class=='Accounts')
            if(Accounts::findOne($this->id)){
                $this->isNewRecord=false;
            }
        $a=parent::save($runValidation,$attributes);
        if($a){
            //if (isset($_POST['Files'])) {
                //$this->attributes = $_POST['Files'];
                $tmps = \yii\web\UploadedFile::getInstancesByName('Files');
                // proceed if the images have been set
                if (isset($tmps) && count($tmps) > 0) {
                    \Yii::info('saved');
                    // go through each uploaded image
                    $configPath=  \app\helpers\Linet3Helper::getSetting("company.path");
                    
                    
                    foreach ($tmps as $image => $pic) {
                        $img_add = new Files();
                        $img_add->name = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                        $img_add->path="files/";
                        $img_add->parent_type=get_class($this);
                        $img_add->parent_id = $this->id; // this links your picture model to the main model (like your user, or profile model)

                        $img_add->save(); // DONE
                        
                        if ($pic->saveAs($img_add->getFullFilePath())) {
                            // add it to the main model now
                            
                        }
                        else{
                            echo 'Cannot upload!';
                        }
                    }
                    
                    
                    
                    
                if(isset($_FILES)) {
                    Yii::info(print_r($_FILES,true));
                    unset($_FILES);
                    $tmps = \yii\web\UploadedFile::reset();
                    
                }
                //}
            
            }
        }//endFile
        
        
        
        
        
        return $a;
    }
    
}
