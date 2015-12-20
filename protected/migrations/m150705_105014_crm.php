<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\Company;
class m150705_105014_crm extends Migration
{
    public function up()
    {
        $companys = Company::find()->All();
        foreach ($companys as $company) {
            //update payment,config
            $table = Yii::$app->db->schema->getTableSchema($company->prefix .'accHist');
            if(!isset($table->columns['subject'])) {
                $this->addColumn($company->prefix . 'accHist', 'subject','VARCHAR(255)');
                $this->addColumn($company->prefix . 'accHist', 'status','INTEGER(11)');
                $this->addColumn($company->prefix . 'accHist', 'type','INTEGER(11)');
            }

        }
        return true;
    }

    public function down()
    {
        echo "m150705_105014_crm cannot be reverted.\n";

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
