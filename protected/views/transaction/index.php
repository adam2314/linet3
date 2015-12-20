<?php

$dateisOn = kartik\datecontrol\DateControl::widget(['model' => $model, 'attribute' => 'from_date', 'type' => 'date']) .
        kartik\datecontrol\DateControl::widget(['model' => $model, 'attribute' => 'to_date', 'type' => 'date']);
?>

<?php

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Transactions for Num") . ": " . $model->num,
));


echo app\widgets\GridView::widget(array(
    'id' => 'transactions-grid',
    'dataProvider' => $model->dp(),
    //'enablePagination'=> false,
    //'filter' => $model,
    'columns' => array(
        'num',
        'linenum',
        array(
            'value' => function($data) {
                return $data->accountLink();
            },
            'format' => 'raw',
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
          ), */
        array(
            'attribute' => 'refnum1',
            'value' => function($data) {
                return $data->refnumDocsLink();
            },
            'format' => 'raw',
        ),
        //array(
            'refnum2',
            //'value' => '\yii\helpers\Html::encode($data->refnum2)',
            //'format' => 'raw',
        //),
        'details',
        array(
            'attribute' => 'valuedate',
            'filter' => $dateisOn,
            'value' => function($data) {
                return $data->readDateFormat($data->valuedate);
            },
        ),
        array(
            'attribute' => 'reg_date',
            'filter' => '',
            'value' => function($data) {
                return $data->readDateFormat($data->reg_date);
            },
        ),
        array(
            'header' => Yii::t('app', 'Debit'),
            'attribute' => 'sum',
            'filter' => '',
            //'cssClassExpression' => "'number'",
            'value' => function($data) {
                return ($data->sum < 0) ? $data->sum : "";
            },
        ),
        array(
            'header' => Yii::t('app', 'Credit'),
            'attribute' => 'sum',
            'filter' => '',
            //'cssClassExpression' => "'number'",
            'value' => function($data) {
                return ($data->sum > 0) ? $data->sum : "";
            },
        ),
        array(
            'header' => Yii::t('app', 'Balance'),
            'attribute' => 'sum',
            'filter' => '',
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
