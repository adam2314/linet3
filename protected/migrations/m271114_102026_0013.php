<?php
class m271114_102026_0013 extends CDbMigration {

    public function up() {
        //return false;
        
        $this->insert('menu', array("id"=>77,"label"=>"Payment Admin","url"=>"payment/admin","parent"=>1)); 
        
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
