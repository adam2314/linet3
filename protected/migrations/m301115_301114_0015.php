<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m301115_301114_0015 extends CDbMigration {

    public function up() {
        return true;

        $companys = Company::model()->findAll();
        foreach ($companys as $company) {

            //$this->update($company->prefix . 'docType', array("account_type"=>1,'oppt_account_type'=>null), "id=16");
            //$this->update($company->prefix . 'docType', array("account_type"=>1,'oppt_account_type'=>null), "id=17");
            //$this->update($company->prefix . 'docStatus', array("action"=>-1), "doc_type=17 AND num=1");
            $this->update($company->prefix . 'docType', array("stockAction" => "-1"), "id=17");
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
