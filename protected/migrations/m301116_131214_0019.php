<?php

class m301116_101214_0018 extends CDbMigration {

    public function up() {
        //return false;
        $this->update( 'menu', array("url"=>"newUpdate"), "id=64");
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
