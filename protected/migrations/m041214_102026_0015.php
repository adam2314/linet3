<?php
class m041214_102026_0015 extends CDbMigration {

    public function up() {
        //return false;
        
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
