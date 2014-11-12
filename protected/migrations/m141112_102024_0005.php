<?php

class m141112_102024_0005 extends CDbMigration {

    public function up() {


        $this->createTable('download', array(
            'id' => 'varchar(255) NOT NULL',
            'company_id' => 'int(11) NOT NULL',
            'file_id' => 'int(11) NOT NULL',
            'PRIMARY KEY (`id`)'
        ));
    }

    public function down() {

        $this->dropTable('download');

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
