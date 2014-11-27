<?php
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
