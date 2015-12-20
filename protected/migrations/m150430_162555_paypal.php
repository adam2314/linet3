<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\Company;
class m150430_162555_paypal extends Migration {

    public function up() {
        $companys = Company::find()->All();
        foreach ($companys as $company) {
            //update payment,config
            $this->insert($company->prefix . 'paymentType', ['id' => 8,'name'=>'PayPal','value' => '\app\components\payments\Cash','oppt_account_id'=>12]);


            $this->insert($company->prefix . 'accounts', ["id" => 12,"type"=>4,'name'=>'PayPal','src_tax'=>0]);
            $this->update($company->prefix . 'files', ['parent_type' => '\\app\\models\\docs'], ['parent_type' => "Docs"]);
            $this->update($company->prefix . 'files', ['parent_type' => '\\app\\models\\Accounts'], ['parent_type' => "Accounts"]);
        }
        return true;
    }

    public function down() {
        echo "m150430_162555_paypal cannot be reverted.\n";

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
