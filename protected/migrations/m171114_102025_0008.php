<?php

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
