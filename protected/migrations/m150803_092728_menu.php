<?php

use yii\db\Schema;
use yii\db\Migration;

class m150803_092728_menu extends Migration {

    public function up() {
        $table = Yii::$app->db->schema->getTableSchema('menu');
        if (!isset($table->columns['module'])) {
            $this->addColumn('menu', 'module', 'VARCHAR(255)');
        }
        return true;
    }

    public function down() {
        echo "m150803_092728_menu cannot be reverted.\n";

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
