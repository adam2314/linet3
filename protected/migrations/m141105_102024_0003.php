<?php

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