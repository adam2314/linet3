<?php

use yii\db\Schema;
use yii\db\Migration;

use app\models\Menu;
use app\models\Company;
class m150813_141722_tax extends Migration {

    public function up() {




        $this->updateC('app\models\Menu',80,[ 'name' => 'Taxes','icon'=>'glyphicon glyphicon-flag',  'parent' => 0,'route'=>null]);
        $this->updateC('app\models\Menu',94,[ 'name' => 'Test System', 'route' => 'test/test', 'parent' => 80]);//Test Report

        $this->update('menu', ['parent' => 0], ['id' => 1]); //Settings
        $this->update('menu', ['parent' => 0], ['id' => 12]); //Manage Accounts
        $this->update('menu', ['parent' => 0], ['id' => 57]); //Import Export
        $this->update('menu', ['parent' => 0], ['id' => 63]); //support
        //$this->update('menu', ['name' => "Taxes"], ['id' => 80]); //label taxes
        //add pcn854,tax and vat reports
        $this->update('menu', ['parent' => 80], ['id' => 62]); //pcn874
        $this->update('menu', ['parent' => 80, 'route' => 'tax/vat'], ['id' => 54]); //vat
        $this->update('menu', ['parent' => 80, 'route' => 'tax/taxrep'], ['id' => 56]); //taxrep
        //remove 80
        //bug fix openfrmt
        $this->update('openformat', ['type' => "99"], ['id' => 1268]);
        $this->update('openformat', ['export' => "this.discount"], ['id' => 1220]);
        $this->update('openformat', ['export' => "func.OpenfrmtNoVatTotal"], ['id' => 1221]);
        $this->update('openformat', ['export' => "func.getVersion"], ['id' => 1008]);
        
        $companys = Company::find()->All();
        foreach ($companys as $company) {
            //docType-bug
            $this->update($company->prefix . 'docType', ["docStatus_id" => "1"], ["id" => "18"]); //Receipt For Donation
            $this->update($company->prefix . 'docType', ["transactionType_id" => "0"], ["id" => "5"]); //return doc error
            
            
            
            $company->loadComp($company);
            
            

            //update config expert mode
            //add account active
            $table = Yii::$app->db->schema->getTableSchema($company->prefix .'accounts');
            if(!isset($table->columns['active'])) {
                // Column doesn't exist
                $this->addColumn($company->prefix . 'accounts', 'active', '	tinyint(1)');
                $this->update($company->prefix . 'accounts', ["active" => "1"]);//
            }
            
            
            
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
        }
        $model->attributes=$params;
        return $model->save();
        
    }
    private function deleteC($modelType,$id){
        $model=$modelType::findOne($id);
        if($model!==null){
            
            $model->delete();
            //$model->id=$id;//if array shuld be better
        }
        
    }

    public function down() {
        
        
        $this->deleteC('app\models\Menu',91);//102 Report
        $this->deleteC('app\models\Menu',92);//1000 System
        $this->deleteC('app\models\Menu',93);//856 Report
        
        
        
        $companys = Company::find()->All();
        foreach ($companys as $company) {
            //docType-bug
            
            $company->loadComp($company);
            
            
            //update config tax refrance
            $this->deleteC('app\models\Settings', 'company.tax.src_per'); //supplier_src//ניקויי מס במקור מספקים
            $this->deleteC('app\models\Settings', 'company.tax.src_per'); //אחוז ניקוי מס במקור ללקוחות
            $this->deleteC('app\models\Settings', 'company.tax.file');
            
            
        }
        Yii::$app->db->close();
        Yii::$app->db->dsn = Yii::$app->dbMain->dsn;//"mysql:host=localhost;dbname=devmultiadam";//
        Yii::$app->db->tablePrefix = Yii::$app->dbMain->tablePrefix;//"CA15_";//
        Yii::$app->db->username = Yii::$app->dbMain->username;//"root";//
        Yii::$app->db->password = Yii::$app->dbMain->password;//"VBy7t6r5";//
        Yii::$app->db->charset = 'utf8';
        Yii::$app->db->open();
        echo "m150813_141722_tax reverted.\n";
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
