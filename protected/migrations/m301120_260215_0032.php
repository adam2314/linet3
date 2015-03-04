<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class m301120_260215_0032 extends CDbMigration {

    public function up() {

        CFileHelper::removeDirectory(Yii::app()->basePath . "/components/dashboard/");
        CFileHelper::removeDirectory(Yii::app()->basePath . "/../update/");
        CFileHelper::removeDirectory(Yii::app()->basePath . "/../assets/lib/chosen/");
        
        $this->update( 'openformat', array("export"=>"this.reg_date","import"=>'this.reg_date'), "id='1375'");
        

    }

    public function down() {
 
		return true;
    }

}
