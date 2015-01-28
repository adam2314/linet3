<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class m301119_280115_0029 extends CDbMigration {

    public function up() {

        CFileHelper::removeDirectory(Yii::app()->basePath . "/components/dashboard/");
        CFileHelper::removeDirectory(Yii::app()->basePath . "/../update/");
        CFileHelper::removeDirectory(Yii::app()->basePath . "/../assets/lib/chosen/");

        
        $companys = Company::model()->findAll();      
        foreach ($companys as $company) {
            $this->addColumn($company->prefix .'docDetails', 'iTotalVat', 'decimal(20,2) NOT NULL');
            $this->update($company->prefix . 'config', array("value"=>"2"), "id='company.precision'");
            
            $this->update($company->prefix . 'docDetails', array("iTotalVat"=>new CDbExpression("`iTotal`*(1+`iVatRate`/100)")), "1=1");

        }

    }

    public function down() {
 
            $companys=  Company::model()->findAll();
            foreach($companys as $company){
                $this->dropColumn($company->prefix.'docDetails', 'iTotalVat'); 
                
            }
            
		return true;
    }

}
