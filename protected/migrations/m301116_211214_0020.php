<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m301116_211214_0020 extends CDbMigration {

    public function up() {
        //return false;
        //$this->update( 'menu', array("url"=>"newUpdate"), "id=64");



        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->renameColumn($company->prefix . 'transactions', "date", 'reg_date');
            $this->renameColumn($company->prefix . 'docs', "modified", 'reg_date');
            $this->alterColumn($company->prefix . 'transactions', "reg_date", 'TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
            $this->addColumn($company->prefix . 'transactions', 'due_date', 'timestamp NOT NULL AFTER `valuedate`');
            $this->alterColumn($company->prefix . 'docs', "reg_date", 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        }
    }

    public function down() {

        return true;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
