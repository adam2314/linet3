<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m271114_102025_0012 extends CDbMigration {

    public function up() {
        //return false;
        
        
        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->addColumn($company->prefix . 'docs', 'refnum_ext', 'varchar(255) AFTER `refnum`');


//*/
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
