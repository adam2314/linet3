<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\Company;

class m151208_144707_token extends Migration {

    public function up() {
        /*
          $this->createTable('{{token}}', [
          'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
          'code' => Schema::TYPE_STRING . '(32) NOT NULL',
          'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
          'type' => Schema::TYPE_SMALLINT . ' NOT NULL'
          ], $this->tableOptions);

          $this->createIndex('token_unique', '{{token}}', ['user_id', 'code', 'type'], true);
          $this->addForeignKey('fk_user_token', '{{token}}', 'user_id', '{{user}}', 'id', 'CASCADE', 'RESTRICT');
          // */


        $this->update('menu', ["route" => "settings/about"], ['id' => 66]);
        $this->update('menu', ["route" => "settings/bug"], ['id' => 67]);

        $companys = Company::find()->All();
        foreach ($companys as $company) {

            $company->loadComp($company);



            ////doctype
            //issueLabel
            //issueLock
            //duelabel
            //dueLock
            //reflabel
            //refLock
            //valuedate
            // Column doesn't exist
            $this->addColumn($company->prefix . 'docType', 'issueLabel', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'docType', 'issueLock', 'tinyint(1)');
            $this->addColumn($company->prefix . 'docType', 'dueLabel', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'docType', 'dueLock', 'tinyint(1)');
            $this->addColumn($company->prefix . 'docType', 'refLabel', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'docType', 'refLock', 'tinyint(1)');
            $this->addColumn($company->prefix . 'docType', 'valuedate', 'VARCHAR(255)');



            ////accounts
            //bank_name
            //bank_branch
            //bank_acc
            //bank_username
            //bank_passwd
            //iban
            //firstname
            //lastname
            // Column doesn't exist
            $this->addColumn($company->prefix . 'accounts', 'bank_name', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'accounts', 'bank_branch', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'accounts', 'bank_acc', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'accounts', 'bank_username', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'accounts', 'bank_passwd', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'accounts', 'iban', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'accounts', 'firstname', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'accounts', 'lastname', 'VARCHAR(255)');






            //works
            $this->update($company->prefix . 'accounts', [
                "type" => 11,
                    ], ['id' => 110]);
            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Proforma Payment Due Date',
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => null,
                    ], ['id' => 1]);

            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Delivery Shipment Date',
                "dueLock" => 1,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => 'issue_date',
                    ], ['id' => 2]);
            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Invoice Payment Due Date',
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => 'issue_date',
                    ], ['id' => 3]);


            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Credit Date',
                "dueLock" => 1,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => 'issue_date',
                    ], ['id' => 4]);
            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Return Shipment Date',
                "dueLock" => 1,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => 'issue_date',
                    ], ['id' => 5]);

            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Quote Valid Untill',
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => null,
                    ], ['id' => 6]);

            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Item Delivery Due Date',
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => null,
                    ], ['id' => 7]);


            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => null,
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => null,
                    ], ['id' => 8]);
            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => null,
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => 'issue_date',
                    ], ['id' => 9]);

            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Item Delivery Due Date',
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => null,
                    ], ['id' => 10]);
            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => null,
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => null,
                    ], ['id' => 11]);
            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => null,
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => null,
                    ], ['id' => 12]);


            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Report Date',
                "issueLock" => 0,
                "dueLabel" => 'Payment To Supplier Due Date',
                "dueLock" => 0,
                "refLabel" => 'Reference date',
                "refLock" => 0,
                "valuedate" => 'issue_date',
                    ], ['id' => 13]);
            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Report Date',
                "issueLock" => 0,
                "dueLabel" => 'Payment To Supplier Due Date',
                "dueLock" => 0,
                "refLabel" => 'Reference date',
                "refLock" => 0,
                "valuedate" => 'issue_date',
                    ], ['id' => 14]);

            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Inventory Transaction Date',
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => 'due_date',
                    ], ['id' => 15]);

            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Inventory Entry Date',
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => 'due_date',
                    ], ['id' => 16]);
            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => 'Inventory Exit Date',
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => 'due_date',
                    ], ['id' => 17]);
            $this->update($company->prefix . 'docType', [
                "issueLabel" => 'Issue Date',
                "issueLock" => 1,
                "dueLabel" => null,
                "dueLock" => 0,
                "refLabel" => null,
                "refLock" => 1,
                "valuedate" => null,
                    ], ['id' => 18]);



            //$this->update($company->prefix . 'docType', ["docType" => "1"]); //
        }


        Yii::$app->db->close();
        Yii::$app->db->dsn = Yii::$app->dbMain->dsn; //"mysql:host=localhost;dbname=devmultiadam";//
        Yii::$app->db->tablePrefix = Yii::$app->dbMain->tablePrefix; //"CA15_";//
        Yii::$app->db->username = Yii::$app->dbMain->username; //"root";//
        Yii::$app->db->password = Yii::$app->dbMain->password; //"VBy7t6r5";//
        Yii::$app->db->charset = 'utf8';
        Yii::$app->db->open();
    }

    public function addColumn($tableName, $column, $type) {
        $table = Yii::$app->db->schema->getTableSchema($tableName);
        if (!isset($table->columns[$column])) {
            parent::addColumn($tableName, $column, $type);
        }
    }

    public function down() {
        echo "m151208_144707_token cannot be reverted.\n";
        //$this->dropTable('{{token}}');
        return true;
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
