<?php

class m301117_211214_0021 extends CDbMigration {

    public function up() {
        //return false;
        //$this->update( 'menu', array("url"=>"newUpdate"), "id=64");



        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->addColumn($company->prefix . 'docs', 'ref_date', 'timestamp NOT NULL AFTER `reg_date`');
        }
    }

    public function down() {
        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->dropColumn($company->prefix.'transactions', 'ref_date'); 
        }
        return true;
    }

   
}
