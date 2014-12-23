<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m301116_071214_0016 extends CDbMigration {

    public function up() {
        return true;

        $companys = Company::model()->findAll();
        foreach ($companys as $company) {


            $this->alterColumn($company->prefix . 'transactions', "valuedate", 'TIMESTAMP NOT NULL DEFAULT "0000-00-00 00:00:00"');
            $this->alterColumn($company->prefix . 'transactions', "date", "TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
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
