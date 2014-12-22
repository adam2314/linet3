<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m171114_102025_0008 extends CDbMigration {

    public function up() {



        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->update($company->prefix . 'docStatus', array("action"=>"-1"), "num=2 AND doc_type=4");
        }
    }

    public function down() {
        $companys = Company::model()->findAll();
        foreach ($companys as $company) {

            $this->update($company->prefix . 'docStatus', array("action"=>"1"), "num=2 AND doc_type=4");
        }


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

