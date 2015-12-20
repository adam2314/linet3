<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\models;
use Yii;
use yii\base\Model;
use app\models\Accounts;
use app\models\Docs;
class FormOwe extends Model {
    
    private function getDocs($account_id){
        $sum=0;
        //1=Proforma
        $doctype=1;
        $openDocs=Docs::find()->where(['account_id'=>$account_id,'doctype'=>$doctype,'refstatus'=>Docs::STATUS_OPEN])
                //->andWhere(['>=','due_date',Yii::$app->formatter->asDate(time(), Docs::DATETIME_DB)])
                ->all();
        foreach ($openDocs as $doc){
            $sum+=$doc->total;
        }
        
        return $sum;
    }
    
    

    public function find() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $filter = 1; //small change
        $type=0;
        //$type = (int) $this->type;

        $accounts = Accounts::findAllByType($type);
        // or using: $rawData=User::find()->All();
        $list = [];
        foreach ($accounts as $account) {
            $transBalance = $account->getBalance();
            $docBalance=$this->getDocs($account->id);
            if (($transBalance > $filter) || ($transBalance < $filter * -1))
                $list[] = array('id' => $account->id, 'name' => $account->name, 'transactions' => $transBalance,'doc'=>$docBalance,'sum'=>$transBalance-$docBalance);
        }


        $dataProvider = new \yii\data\ArrayDataProvider(array(
            'allModels'=>$list,
            'id' => 'user',
            'sort' => array(
                'attributes' => [ 'id', 'name', 'transactions','doc','sum']
            ),
            'pagination' => false
        ));

        return $dataProvider;
// $dataProvider->getData() will return a list of arrays.
    }

}
