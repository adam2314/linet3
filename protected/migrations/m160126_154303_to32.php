<?php

use yii\db\Migration;

class m160126_154303_to32 extends Migration
{
    public function up()
    {
        $companys = Company::find()->All();
        foreach ($companys as $company) {
            $company->loadComp($company);
            
            $this->alterColumn($company->prefix . 'docDetails', 'qty', 'DECIMAL(20,2) NULL DEFAULT NULL');
            $this->updateC('app\models\Accounts', ['id' => 105], [ 'name' =>  'הכנסות מתרומה', 'type' => '3', 'id6111' => '0','src_tax'=>'0']);
        }
        return false;
    }

    public function down()
    {
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
