<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m0301116_071214_0017 extends CDbMigration {

    public function up() {
        return true;

        $companys = Company::model()->findAll();
        foreach ($companys as $company) {


            $this->update($company->prefix . 'Rights', array("itemname" => "Admin",'type' => '1','weight' => '0'), "itemname='Authenticated'");
            $this->update($company->prefix . 'Rights', array("itemname" => "User",'type' => '2','weight' => '1'), "itemname='Editor'");
            $this->update($company->prefix . 'Rights', array('type' => '3','weight' => '2'), "itemname='Guest'");
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
