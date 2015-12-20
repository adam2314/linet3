<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
use app\models\Accounts;
foreach ($model->accounts() as $account) {
    
    
    $dp=$model->search($account);
    
    if($dp->getCount()>0){
        echo "<h3>" . $account["id"] . " " . $account["name"] . "</h3>";
        echo app\widgets\GridView::widget( array(
        'id' => 'transactions-grid' . $account["id"],
        'dataProvider' => $model->search($account["id"]),
        'columns' => array(
            array(
                'attribute' => 'num',
                'value' => function($data){return $data->numLink();},
                'format' => 'raw',
            ),
            
             
            /*
              array(
              'value' => '\yii\helpers\Html::link(\yii\helpers\Html::encode($data->getOptAccName()),yii\helpers\BaseUrl::base().("/accounts/transaction/".$data->getOptAccId()))',
              'type' => 'raw',
              ), */
            array(
                'attribute' => 'type',
                'value' => function($data){return Yii::t("app",$data->ttype->name);},
            ),
            array(
                'attribute' => 'refnum1',
                'value' => function($data){return $data->refnumDocsLink();},
                'format' => 'raw',
            ),
            //array(
                'attribute' => 'refnum2',
                //'value' => '\yii\helpers\Html::encode($data->refnum2)',
                //'format' => 'raw',
            //),
            'details',
            array(
                'attribute' => 'valuedate',
                'filter' => '',
                'value' => function($data){return $data->readDateFormat($data->valuedate);},
            ),
            array(
                'header' => Yii::t('app', 'Debit'),
                'attribute' => 'sum',
                'filter' => '',
                //'cssClassExpression' => "'number'",
                'value' => function($data){return ($data->sum<0)?$data->sum:"";},
            ),
            array(
                'header' => Yii::t('app', 'Credit'),
                'attribute' => 'sum',
                'filter' => '',
                //'cssClassExpression' => "'number'",
                'value' => function($data){return ($data->sum>0)?$data->sum:"";},
            ),
            array(
                'header' => Yii::t('app', 'Balance'),
                'attribute' => 'sum',
                'filter' => '',
                //'cssClassExpression' => "'number'",
                'value' => function($data){return $data->getBalance();},
            ),
        ),
    ));
}
}
?>