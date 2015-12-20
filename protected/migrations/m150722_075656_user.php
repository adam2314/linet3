<?php

use yii\db\Schema;
use yii\db\Migration;

class m150722_075656_user extends Migration
{
    public function up()
    {
        
        $table = Yii::$app->db->schema->getTableSchema('user');
        if(!isset($table->columns['home'])) {
            $this->addColumn( 'user', 'home','VARCHAR(255)');
            $this->addColumn( 'user', 'company','int(11) not NULL');
            }    
        return true;
    }

    public function down()
    {
        echo "m150722_075656_user cannot be reverted.\n";

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
