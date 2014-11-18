<?php

class m171114_102024_0007 extends CDbMigration {

    public function up() {



        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->addColumn($company->prefix . 'files', 'hidden', 'BOOLEAN NOT NULL AFTER `path`');

        }
    }

    public function down() {
        $companys = Company::model()->findAll();
        foreach ($companys as $company) {

            $this->dropColumn($company->prefix . 'files', 'hidden');
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
