<?php

use yii\db\Migration;
use app\models\Company;

class m160406_075437_docDisply extends Migration
{
    public function up()
    {

        $this->update('menu', ['route' => 'itemvatcat/admin'], ['id' => 9]);
         
         
         
        $companys = Company::find()->All();
        foreach ($companys as $company) {
            $company->loadComp($company);
            
            
            $this->alterColumn($company->prefix . 'transactions', 'reg_date', 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
            $this->alterColumn($company->prefix . 'docs', 'reg_date', 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
            $this->alterColumn($company->prefix . 'stockAction', 'createDate', 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
            $this->alterColumn($company->prefix . 'files', 'date', 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
            
            
            $this->addColumn($company->prefix . 'docs', 'currency_rate', 'DECIMAL(20,2) NULL DEFAULT NULL');
            $this->addColumn($company->prefix . 'docDetails', 'currency_rate', 'DECIMAL(20,2) NULL DEFAULT NULL');
            $this->addColumn($company->prefix . 'docCheques', 'currency_rate', 'DECIMAL(20,2) NULL DEFAULT NULL');
            $this->addColumn($company->prefix . 'transaction', 'currency_rate', 'DECIMAL(20,2) NULL DEFAULT NULL');

            $this->addColumn($company->prefix . 'docCheques', 'doc_sum', 'DECIMAL(20,2) NULL DEFAULT NULL');
            $this->addColumn($company->prefix . 'docDetails', 'account_id', 'INT(11) NULL DEFAULT NULL');
            $this->addColumn($company->prefix . 'docDetails', 'warehouse_id', 'INT(11) NULL DEFAULT NULL');
            $this->addColumn($company->prefix . 'docDetails', 'vat_cat_id', 'INT(11) NULL DEFAULT NULL');
            
            $this->addColumn($company->prefix . 'mail', 'parent_type', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'mail', 'parent_id', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'mail', 'message_id', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'mail', 'rtl', 'tinyint(1)');
            $this->addColumn($company->prefix . 'mail', 'delivered', ' timestamp NULL DEFAULT NULL');
            $this->addColumn($company->prefix . 'mail', 'opened', ' timestamp NULL DEFAULT NULL');
            
            $this->addColumn($company->prefix . 'transactions', 'storno', " INT(11) NOT NULL DEFAULT '0'");
            $this->addColumn($company->prefix . 'items', 'income_acc', " INT(11) NOT NULL DEFAULT '100'");

            $this->addColumn($company->prefix . 'itemVatCat', 'tax_rate', 'decimal(4,2) NULL DEFAULT NULL');
            $this->updateC('app\models\ItemVatCat', ['id' => '1'], ['tax_rate' => 17]);
            $this->updateC('app\models\ItemVatCat', ['id' => '2'], ['tax_rate' => 0]);
            
            
            $this->updateC('app\models\Settings', ['id' => 'pelecard.savecard'], [ 'eavType' => 'boolean', 'hidden' => 1, "priority" => 40]);
            $this->updateC('app\models\Settings', ['id' => 'pelecard.pid'], ['eavType' => 'boolean', 'hidden' => 1, "priority" => 40]);
            $this->updateC('app\models\Settings', ['id' => 'pelecard.cvv'], [ 'eavType' => 'boolean', 'hidden' => 1, "priority" => 40]);
            
            
            
            $this->update($company->prefix . 'transactions', ['currency_rate' => '1'], ['currency_id' => "ILS"]);
            $this->update($company->prefix . 'docCheques', ['currency_rate' => '1'], ['currency_id' => "ILS"]);
            $this->update($company->prefix . 'docs', ['currency_rate' => '1'], ['currency_id' => "ILS"]);
            $this->update($company->prefix . 'docDetails', ['currency_rate' => '1'], ['currency_id' => "ILS"]);
            
            $this->update($company->prefix . 'docType', ['issueLabel' => 'Date'], ['issueLabel' => "Issue Date"]);
            
            if (!dbMaster::tableExists($company->prefix . 'printView')) {
                $this->createTable($company->prefix . 'printView', [
                    'id' => Schema::TYPE_INTEGER . ' NOT NULL AUTO_INCREMENT PRIMARY KEY',
                    'doctype' => Schema::TYPE_INTEGER . ' NOT NULL',
                    'name' => Schema::TYPE_STRING . ' NOT NULL',
                    
                    'det_line' => 'tinyint(1)',
                    'det_itemId' => 'tinyint(1)',
                    'det_name' => 'tinyint(1)',
                    'det_description' => 'tinyint(1)',
                    'det_qty' => 'tinyint(1)',
                    'det_iItem' => 'tinyint(1)',
                    'det_unit_id' => 'tinyint(1)',
                    'det_currency_id' => 'tinyint(1)',
                    'det_currency_rate' => 'tinyint(1)',
                    'det_iTotal' => 'tinyint(1)',
                    'det_iVatRate' => 'tinyint(1)',
                    'det_iTotalVat' => 'tinyint(1)',
                    
                    'rcpt_line' => 'tinyint(1)',
                    'rcpt_type' => 'tinyint(1)',
                    'rcpt_detail' => 'tinyint(1)',
                    'rcpt_sum' => 'tinyint(1)',
                    'rcpt_doc_sum' => 'tinyint(1)',
                    'rcpt_currency_id' => 'tinyint(1)',
                    'rcpt_currency_rate' => 'tinyint(1)',
                    
                    
                    'doc_refnum' => 'tinyint(1)',
                    'doc_refnum_ext' => 'tinyint(1)',
                    'doc_discount' => 'tinyint(1)',
                    'doc_sub_total' => 'tinyint(1)',
                    'doc_novat_total' => 'tinyint(1)',
                    'doc_vat' => 'tinyint(1)',
                    'doc_total' => 'tinyint(1)',
                    'doc_currency_id' => 'tinyint(1)',
                    'doc_currency_rate' => 'tinyint(1)',
                    
                    'det_collspan' => Schema::TYPE_INTEGER . ' NOT NULL',
                    'rcpt_collspan' => Schema::TYPE_INTEGER . ' NOT NULL',
                    
                    
                    
                    
                    
                ]);
            }
            
        }
        
        
        
        Yii::$app->db->close();
        Yii::$app->db->dsn = Yii::$app->dbMain->dsn; 
        Yii::$app->db->tablePrefix = Yii::$app->dbMain->tablePrefix; 
        Yii::$app->db->username = Yii::$app->dbMain->username; 
        Yii::$app->db->password = Yii::$app->dbMain->password; 
        Yii::$app->db->charset = 'utf8';
        Yii::$app->db->open();
        
        return false;
    }

    public function down()
    {
        
        
        
        
        echo "m160406_075437_docDisply cannot be reverted.\n";

         
        
        return true;
    }
    
    public function addColumn($tableName, $column, $type) {
        $table = Yii::$app->db->schema->getTableSchema($tableName);
        if (!isset($table->columns[$column])) {
            parent::addColumn($tableName, $column, $type);
        }
    }
    
    
    
    private function updateC($modelType, $ids, $params = []) {
        $model = $modelType::findOne($ids);
        if ($model == null) {
            $model = new $modelType;
        }
        foreach ($ids as $key => $value)
            $model->$key = $value;
        //$model->id = $ids[0]; //if array shuld be better
        $model->attributes = $params;
        $result = $model->save(false);
        //print_r($model->errors);
        return $result;

        //return false;
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
