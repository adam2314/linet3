<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m301116_101214_0018 extends CDbMigration {

    public function up() {
        //return false;

        $companys = Company::model()->findAll();
        foreach ($companys as $company) {

            
            //if(PaymentType::model()->findByPk(7)!==null)
            $this->insert($company->prefix . 'paymentType', array("id" => 7, "name" => "Source Tax", "value" => "SourceTax", "oppt_account_id" => 8));
            
            
            $this->insert($company->prefix . 'AuthItemChild', array("parent" => "Purchase Manager", "child" => "Item.JSON"));
            $this->insert($company->prefix . 'AuthItemChild', array("parent" => "Salesman", "child" => "Item.JSON"));
            $this->insert($company->prefix . 'AuthItemChild', array("parent" => "Salesman", "child" => "Accounts.JSON"));
            
        }
    }

    public function down() {
        $companys = Company::model()->findAll();
        foreach ($companys as $company) {

            
            $this->delete($company->prefix . 'paymentType', "id=7");
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
