<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m301118_211214_0022 extends CDbMigration {

    public function up() {
        //return false;
        //$this->update( 'menu', array("url"=>"newUpdate"), "id=64");



        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->dropColumn($company->prefix.'transactions', 'due_date'); 
        }
    }

    public function down() {
       
        return true;
    }

   
}
