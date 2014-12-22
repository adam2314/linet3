<?php

class m301118_221214_0023 extends CDbMigration {

    public function up() {
        //return false;
        //$this->update( 'menu', array("url"=>"newUpdate"), "id=64");

        $this->update('menu', array("parent" => "12"), "id=3");

        
    }

    public function down() {
       
        return true;
    }

   
}
