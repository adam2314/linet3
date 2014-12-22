<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m301114_102026_0014 extends CDbMigration {

    public function up() {
        return true;
        
        $this->insert('menu', array("id"=>78,"label"=>"Stock entry certificate","url"=>"docs/create/16","parent"=>16)); 
        $this->insert('menu', array("id"=>79,"label"=>"Stock exit certificate","url"=>"docs/create/17","parent"=>16)); 
        
        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            
            $this->insert($company->prefix.'docType', array("id"=>16, "name"=>'Stock entry certificate', "openformat"=>810, "isdoc"=>1, "isrecipet"=>0,
                "iscontract"=>0, "looked"=>1, "stockAction"=>1, "account_type"=>1, "docStatus_id"=>1, "last_docnum"=>0, "oppt_account_type"=>null,
                "transactionType_id"=>null, "vat_acc_id"=>0,"header"=>'', "footer"=>'', "stockSwitch"=>1, "copy"=>1)); 
           
            
            
            $this->insert($company->prefix.'docType', array("id"=>17, "name"=>'Stock exit certificate', "openformat"=>820, "isdoc"=>1, "isrecipet"=>0,
                "iscontract"=>0, "looked"=>1, "stockAction"=>1, "account_type"=>1, "docStatus_id"=>1, "last_docnum"=>0, "oppt_account_type"=>null,
                "transactionType_id"=>null, "vat_acc_id"=>0,"header"=>'', "footer"=>'', "stockSwitch"=>1, "copy"=>1)); 
            
            
            //$this->update($company->prefix . 'docType', array("account_type"=>1,'oppt_account_type'=>null), "id=16");
            //$this->update($company->prefix . 'docType', array("account_type"=>1,'oppt_account_type'=>null), "id=17");
            //$this->update($company->prefix . 'docStatus', array("action"=>-1), "doc_type=17 AND num=1");
            
            $this->insert($company->prefix.'docStatus', array( "num"=>1, "doc_type"=>16, "name"=>"הופק", "looked"=>1, "action"=>1, ));
            $this->insert($company->prefix.'docStatus', array( "num"=>1, "doc_type"=>17, "name"=>"הופק", "looked"=>1, "action"=>-1, ));
           
        }
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
