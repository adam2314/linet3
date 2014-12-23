<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m141112_102024_0005 extends CDbMigration {

    public function up() {


        $this->createTable('download', array(
            'id' => 'varchar(255) NOT NULL',
            'company_id' => 'int(11) NOT NULL',
            'file_id' => 'int(11) NOT NULL',
            'PRIMARY KEY (`id`)'
        ));
    }

    public function down() {

        $this->dropTable('download');

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
