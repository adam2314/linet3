<?php

use yii\db\Schema;
use yii\db\Migration;

class m150713_130147_log extends Migration
{
    public function up()
    {
        $this->dropTable("log");
         $this->createTable('log', [
                'id' => Schema::TYPE_BIGINT . ' NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'level' => Schema::TYPE_INTEGER,
                'category' => Schema::TYPE_STRING,
                'log_time' => Schema::TYPE_DOUBLE,
                'prefix' => Schema::TYPE_TEXT,
                'message' => Schema::TYPE_TEXT,

            ]);
        
        return true;
    }

    public function down()
    {
        echo "m150713_130147_log cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
