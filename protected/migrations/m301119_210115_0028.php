<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class m301119_210115_0028 extends CDbMigration {

    public function up() {

        CFileHelper::removeDirectory(Yii::app()->basePath . "/components/dashboard/");
        CFileHelper::removeDirectory(Yii::app()->basePath . "/../update/");
        CFileHelper::removeDirectory(Yii::app()->basePath . "/../assets/lib/chosen/");

        
        $companys = Company::model()->findAll();      
        foreach ($companys as $company) {
            $this->addColumn($company->prefix .'mail', 'sent', 'int(11) NOT NULL');
            $this->insert($company->prefix . 'config', array("id" => "company.sumDiff", "value" => 0.05, "eavType" => "string", "hidden" => 1, "priority"=>40));
            $this->insert($company->prefix . 'config', array("id" => "company.precision", "value" => 1, "eavType" => "integer", "hidden" => 1, "priority"=>40));
            
        }

    }

    public function down() {

        return true;
    }

}
