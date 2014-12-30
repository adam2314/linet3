<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class m301118_301214_0025 extends CDbMigration {

    public function up() {
        //return false;
        //$this->update( 'menu', array("url"=>"newUpdate"), "id=64");
        
        CFileHelper::removeDirectory(Yii::app()->basePath."/components/dashboard/");
        CFileHelper::removeDirectory(Yii::app()->basePath."/../update/");
        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->delete($company->prefix . 'docDetails',"iItem=0 AND qty=0 AND iTotal=0 AND ihTotal=0"); 	
        }
    }

    public function down() {

        return true;
    }

}
