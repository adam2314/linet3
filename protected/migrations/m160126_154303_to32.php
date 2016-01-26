<?php

use yii\db\Migration;

class m160126_154303_to32 extends Migration
{
    public function up()
    {
$companys = Company::find()->All();
        foreach ($companys as $company) {
            $company->loadComp($company);
            
            $this->updateC('app\models\Accounts', ['id' => 105], [ 'name' =>  'הכנסות מתרומה', 'type' => '3', 'id6111' => '0','src_tax'=>'0']);
        }
    }

    public function down()
    {
        echo "m160126_154303_to32 cannot be reverted.\n";

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
