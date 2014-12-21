<?php

class m301118_211214_0022 extends CDbMigration {

    public function up() {
        //return false;
        //$this->update( 'menu', array("url"=>"newUpdate"), "id=64");



        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->dropColumn($company->prefix.'transactions', 'due_date'); 
        }
    }

    public function down() {
       
        return true;
    }

   
}
