<?php

use yii\db\Migration;
use app\models\Company;

class m160126_154303_to32 extends Migration {

    public function addColumn($tableName, $column, $type) {
        $table = Yii::$app->db->schema->getTableSchema($tableName);
        if (!isset($table->columns[$column])) {
            parent::addColumn($tableName, $column, $type);
        }
    }

    public function up() {
        $companys = Company::find()->All();
        foreach ($companys as $company) {
            $company->loadComp($company);

            $this->alterColumn($company->prefix . 'docDetails', 'qty', 'DECIMAL(20,2) NULL DEFAULT NULL');

            $this->addColumn($company->prefix . 'docs', 'language', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'docs', 'phone', 'VARCHAR(255)');
            $this->addColumn($company->prefix . 'docs', 'email', 'VARCHAR(255)');

            $this->addColumn($company->prefix . 'mailTemplate', 'rtl', 'tinyint(1)');

            $this->updateC('app\models\Accounts', ['id' => 105], [ 'name' => 'הכנסות מתרומה', 'type' => '3', 'id6111' => '0', 'src_tax' => '0']);
        }

        Yii::$app->db->close();
        Yii::$app->db->dsn = Yii::$app->dbMain->dsn; //"mysql:host=localhost;dbname=devmultiadam";//
        Yii::$app->db->tablePrefix = Yii::$app->dbMain->tablePrefix; //"CA15_";//
        Yii::$app->db->username = Yii::$app->dbMain->username; //"root";//
        Yii::$app->db->password = Yii::$app->dbMain->password; //"VBy7t6r5";//
        Yii::$app->db->charset = 'utf8';
        Yii::$app->db->open();

        return true;
    }

    public function down() {
        echo "m160126_154303_to32 cannot be reverted.\n";

        return false;
    }

    private function updateC($modelType, $ids, $params = []) {
        $model = $modelType::findOne($ids);
        if ($model == null) {
            $model = new $modelType;
        }
        foreach ($ids as $key => $value)
            $model->$key = $value;
        $model->attributes = $params;
        $result = $model->save();
        return $result;
    }

}
