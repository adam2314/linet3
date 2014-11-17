<?php

class m161112_102024_0006 extends CDbMigration {

    public function up() {


        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->update($company->prefix . 'transactionType', array("name"=>"Supplier Invoice"), "id=2");

            
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
