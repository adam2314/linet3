<?php

use yii\db\Schema;
use yii\db\Migration;

class m151103_133156_menunew extends Migration
{
    public function up()
    {
        $this->update('menu', ['name' => 'Maintenance'], ['id' => 57]);
        $this->update('menu', ['parent' => 80], ['id' => 58]);
        
        
        
        $this->update('menu', ["order"=>1],["id"=>22]); 
        $this->update('menu', ["order"=>2],["id"=>37]); 
        $this->update('menu', ["order"=>3],["id"=>12]); 
        $this->update('menu', ["order"=>4],["id"=>32]); 
        $this->update('menu', ["order"=>5],["id"=>43]); 
        $this->update('menu', ["order"=>6],["id"=>16]); 
        $this->update('menu', ["order"=>7],["id"=>49]); 
        $this->update('menu', ["order"=>8],["id"=>80]);
        $this->update('menu', ["order"=>9],["id"=>1]);  
        $this->update('menu', ["order"=>10],["id"=>57]);
        $this->update('menu', ["order"=>11],["id"=>63]);

        $companys = app\models\Company::find()->All();
        foreach ($companys as $company) {
            $company->loadComp($company);
            
            $this->update($company->prefix . 'docType', ["transactionType_id" => null], ["id" => "5"]); //return doc error
            
            
            $this->update($company->prefix . 'accType', [
                            "name" => "assets & debits",
                            "desc" => "Assets & Debits"
                            ], ["id" => "4"]); //return doc error
            //Assets & Debits
            $this->update($company->prefix . 'accType', [
                            "name" => "capital & surplus",
                            "desc" => "Capital & Surplus"
                            ], ["id" => "5"]);
            //Capital & Surplus
            
            $this->updateC('app\models\Accounts',50,[ 'name' => 'דיבידנד','src_tax'=>'30',  'type' => 5,'currency_id'=>'ILS']);
            $this->updateC('app\models\Accounts',51,[ 'name' => 'יתרת רווח והפסד','src_tax'=>'0',  'type' => 5,'currency_id'=>'ILS']);
        }
        Yii::$app->db->close();
        Yii::$app->db->dsn = Yii::$app->dbMain->dsn;//"mysql:host=localhost;dbname=devmultiadam";//
        Yii::$app->db->tablePrefix = Yii::$app->dbMain->tablePrefix;//"CA15_";//
        Yii::$app->db->username = Yii::$app->dbMain->username;//"root";//
        Yii::$app->db->password = Yii::$app->dbMain->password;//"VBy7t6r5";//
        Yii::$app->db->charset = 'utf8';
        Yii::$app->db->open();
        return true;
    }
    
     private function updateC($modelType,$id,$params){
        $model=$modelType::findOne($id);
        if($model==null){
            $model=new $modelType;
            $model->id=$id;//if array shuld be better
            $model->attributes=$params;
            return $model->save();
        }
        
        return false;
    }
    
    

    public function down()
    {
        echo "m151103_133156_menunew cannot be reverted.\n";

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
