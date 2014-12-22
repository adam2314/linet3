<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class FormBackupFile extends CFormModel{
    public $file;
    
    public function rules(){
        return array(
            array('file','file','allowEmpty'=>false,'types'=>'sql, bak'),
            array('file', 'safe')
        );
        
    }
    
    public function attributeLabels() {
        return array(
            'file' => Yii::t('labels', 'File'),
            
            
        );
    }
    
    //put your code here
}
