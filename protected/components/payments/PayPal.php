<?php

/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\components\payments;
class PayPal {
    public function line($attrs=array()){
        return "";
        
    }
    
    public function field(){
        
        return array();
    }
    
    public function settings(){
        
        return array();
    }
    
    
    
    
    public function stoppage() {//needs to have!
        return false;
    }
}