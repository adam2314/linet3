<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
?>

<?php

app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', "Transactions for Account") . ": " . $account->name,
));

//$yiidbdatetime = Yii::$app->locale->getDateFormat('yiidbdatetime');
//$phpdatetime = Yii::$app->locale->getDateFormat('phpdatetime');
echo app\widgets\GridView::widget( array(
    'id' => 'transactions-grid',
    'dataProvider' => $model->search([]),
    //'ajaxUpdate' => true,
    //'ajaxType' => 'POST',
    //'enablePagination'=> false,
    'filterModel' => $model,
    'columns' => array(
        array(
            'attribute' => 'num',
            'value' => function($data) {return $data->numLink();},
            'format' => 'raw',
            //'options' => array('style' => 'width:8%;'),
        ),
        //'prefix',
        //'company',
        /*
        array(
            'value' => '\yii\helpers\Html::link(\yii\helpers\Html::encode($data->getOptAccName()),yii\helpers\BaseUrl::base().("/accounts/transaction/".$data->getOptAccId()))',
            'type' => 'raw',
        ),
        array(
            'name' => 'type',
            //'filter'=>\yii\helpers\Html::dropDownList('Transactions[type]', $model->type,\yii\helpers\ArrayHelper::map(TransactionType::find()->All(), 'id', 'name')),
            'value' => 'Yii::t("app",$data->Type->name)'
        ),*/
        array(
            'attribute' => 'refnum1',
            'value' => function($data) {return $data->refnumDocsLink();},
            'format' => 'raw',
        ),
        array(
            'attribute' => 'refnum2',
            //'value' => '\yii\helpers\Html::encode($data->refnum2)',
            //'format' => 'raw',
        ),
        'details',
                [
                    'attribute' => 'valuedate',
                    
                    'filterType' => \kartik\grid\GridView::FILTER_DATE_RANGE,
                    'filterWidgetOptions' => [
                        'convertFormat' => true,
                        'useWithAddon' => true,
                        'pluginOptions' => [
                            'format' => 'Y-m-d',
                            'separator'=> ' to ',
                            ],
                        'hideInput' => true, // from demo config
                        'presetDropdown' => false,
                        
                    ],
                    //'filter' => $dateisOn,
                    //'format' => 'html',
                    'width' => '150px',
                    'value' => function($data) {
                return $data->readDateFormat($data->valuedate);
            },            
        ],            
        [
                    'attribute' => 'reg_date',
                    
                    'filterType' => \kartik\grid\GridView::FILTER_DATE_RANGE,
                    'filterWidgetOptions' => [
                        'convertFormat' => true,
                        'useWithAddon' => true,
                        'pluginOptions' => [
                            'format' => 'Y-m-d',
                            'separator'=> ' to ',
                            ],
                        'hideInput' => true, // from demo config
                        'presetDropdown' => false,
                        
                    ],
                    'width' => '150px',
                    'value' => function($data) {
                return $data->readDateFormat($data->reg_date);
            },            
        ],       
        array(
            'header' => Yii::t('app', 'Debit'),
            'attribute' => 'sum',
            //'filter' => '',
            //'cssClassExpression' => "'number'",
            'value' => function($data) {
                return ($data->sum < 0) ? $data->sum : "";
            },
        ),
        array(
            'header' => Yii::t('app', 'Credit'),
            'attribute' => 'sum',
            //'filter' => '',
            //'cssClassExpression' => "'number'",
            'value' => function($data) {
                return ($data->sum > 0) ? $data->sum : "";
            },
        ),
        array(
            'header' => Yii::t('app', 'Balance'),
            'attribute' => 'sum',
            //'filter' => '',
            //'cssClassExpression' => "'number'",
            'value' => function($data) {
                return $data->getBalance();
            },
        ),
    ),
));
?>


<?php
app\widgets\MiniForm::end();
?>
