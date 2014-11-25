<?php
class m241114_102025_0011 extends CDbMigration {

    public function up() {
        //return false;
        
        
        $this->update('menu', array("parent"=>"43"), "id=3");
        
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
