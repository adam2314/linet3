<?php

class m301116_131214_0019 extends CDbMigration {

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
