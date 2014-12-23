<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m140930_204124_0002 extends CDbMigration
{
	public function up()
	{
            
            $companys=  Company::model()->findAll();
            foreach($companys as $company){
                
                $this->addColumn($company->prefix.'items', 'sku', 'VARCHAR(255) AFTER extcatnum'); 
                $this->createIndex("sku",$company->prefix.'items',"sku",true);
            }
            
            
	}

	public function down()
	{
		//echo "m140930_204124_0002 does not support migration down.\n";
            
            $companys=  Company::model()->findAll();
            foreach($companys as $company){
                $this->dropIndex('sku',$company->prefix.'items'); 
                $this->dropColumn($company->prefix.'items', 'sku'); 
                
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