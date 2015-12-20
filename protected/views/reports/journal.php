<?php

use app\widgets\app\widgets\MiniForm;
use app\models\Transactions;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
?>
<?php

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Transactions"),
        //'width' => '800',
));


echo app\widgets\GridView::widget([
    'dataProvider' => $model->search([]),
    'filterModel' => $model,
    'id' => 'transactions-grid',
    //'filter' => $model,
    'columns' => array(
        array(
            'attribute' => 'num',
        //'options' => array('style' => 'width:8%;'),
        ),
        'linenum',
        array(
            'attribute' => 'type',
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\TransactionType::find()->All(), 'id', 'name'),
            //'filter' => \yii\helpers\ArrayHelper::map(TransactionType::find()->All(), 'id', 'name'),
            'value' => function ($data) {
                return Yii::t("app", $data->ttype->name);
            },
        //'options' => array('style' => 'width:15%;'),
        ),
        array(
            'attribute' => 'account_id',
            //'filter' => \yii\helpers\ArrayHelper::map(Accounts::find()->All(), 'id', 'name'),
            'value' => function ($data) {
                return \yii\helpers\Html::a(\app\models\Accounts::findName($data->account_id), yii\helpers\BaseUrl::base() . ("/accounts/transaction/" . $data->account_id));
            },
            'format' => 'raw',
        ),
        array(
            'attribute' => 'refnum1',
            'value' => function ($data) {
                return $data->refnumDocsLink();
            },
            //'filter' => '',
            'format' => 'raw',
        ),
        'refnum2',
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
            //'cssClassExpression' => "'number'",
            'attribute' => 'sum',
            'filter' => '',
            'value' => function($data) {
                return ($data->sum < 0) ? $data->sum : "";
            },
        ),
        array(
            'header' => Yii::t('app', 'Credit'),
            //'cssClassExpression' => "'number'",
            'attribute' => 'sum',
            'filter' => '',
            'value' => function($data) {
                return ($data->sum > 0) ? $data->sum : "";
            },
        ),
    ),
]);
?>

<?php app\widgets\MiniForm::end(); ?>
