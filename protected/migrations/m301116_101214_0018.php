<?php

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
