<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m301120_140215_0030 extends CDbMigration
{
	public function up()
	{
            

                $this->insert('menu', array("id"=>81,"label"=>"Manage Costumers","url"=>"accounts/index/0","parent"=>22)); 

	}

	public function down()
	{
                        $this->delete("menu","id=81");
            
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