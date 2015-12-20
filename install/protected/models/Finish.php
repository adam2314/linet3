<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

namespace app\models;
use yii\base\Model;
use Yii;
class Finish extends Model {
    public $rename=true;
    public $install=true;
    
    public function rules() {
        return array(
            array(['install', 'rename'], 'safe'),
                //array('type', 'required'),
        );
    }

    private function writeParam(){
        if($this->install){

        file_put_contents('../protected/config/install.php', require 'protected/data/install.php');
        }
        
    }
    
    private function rename(){
        if($this->rename){
            //rename install dir
            return rename ('../install','../'.md5(rand(0, 100)).'install');
            
        }
        
        
    }
    
    
    public function make(){
        //return true;
        
        $this->writeParam();
        $this->rename();
        return true;
    }
    
    
}