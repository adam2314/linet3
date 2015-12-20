<?php

use yii\db\Schema;
use yii\db\Migration;

class m151129_074847_acctype extends Migration {

    public function up() {
        echo "m151129_074847_acctype will be set.\n";
        //(95, 'In Advance Income Tax payment', 'outcome/create/2', 'type=>2', 37, 0),
        echo "menu:" . $this->updateC('app\models\Menu', ['id' => 95], [ 'name' => 'In Advance Income Tax payment', 'route' => 'outcome/create/3', 'parent' => 37]); //Test Report

        $companys = app\models\Company::find()->All();
        foreach ($companys as $company) {
            $company->loadComp($company);


            $this->updateC('app\models\Acctype', ['id' => 11], [ 'name' => 'workers', 'desc' => 'Workers', 'openformat' => '']);
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

    private function updateC($modelType, $ids, $params) {
        $model = $modelType::findOne($ids);
        if ($model == null) {
            $model = new $modelType;
        }
        foreach ($ids as $key => $value)
            $model->$key = $value;
        //$model->id = $ids[0]; //if array shuld be better
        $model->attributes = $params;
        $result = $model->save();
        //print_r($model->errors);
        return $result;

        //return false;
    }

    public function down() {
        echo "m151129_074847_acctype will be reverted.\n";

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
