<?php

class m141109_102024_0004 extends CDbMigration {

    public function up() {


        $this->insert('menu', array("id" => 76, "label" => "Acoount Catagories", "url" => "accCat/admin", "parent" => 12));

        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->addColumn($company->prefix . 'accounts', 'cat_id', 'int(11) AFTER `id6111`');

            $this->createTable($company->prefix . 'accCat', array(
                'id' => 'int(11) NOT NULL AUTO_INCREMENT',
                'name' => 'varchar(255) NOT NULL',
                'type_id' => 'int(11) NOT NULL',
                'PRIMARY KEY (`id`)'
            ));

//*/
        }
    }

    public function down() {
        $this->delete("menu", "id=76");

        $companys = Company::model()->findAll();
        foreach ($companys as $company) {


            $this->dropTable($company->prefix . 'accCat');
            $this->dropColumn($company->prefix . 'accounts', 'cat_id');
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
