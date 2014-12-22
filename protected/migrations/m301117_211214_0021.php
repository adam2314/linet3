<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m301117_211214_0021 extends CDbMigration {

    public function up() {
        //return false;
        //$this->update( 'menu', array("url"=>"newUpdate"), "id=64");



        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->addColumn($company->prefix . 'docs', 'ref_date', 'timestamp NOT NULL AFTER `reg_date`');
        }
    }

    public function down() {
        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->dropColumn($company->prefix.'transactions', 'ref_date'); 
        }
        return true;
    }

   
}
