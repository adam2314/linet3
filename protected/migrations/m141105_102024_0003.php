<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m141105_102024_0003 extends CDbMigration
{
	public function up()
	{
            

                $this->insert('menu', array("id"=>75,"label"=>"Bulk Balance","url"=>"reports/accounts","parent"=>49)); 

	}

	public function down()
	{
                        $this->delete("menu","id=75");
            
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