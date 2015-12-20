<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', "Customers owing money"),
));


echo app\widgets\GridView::widget( array(
    'id' => 'accounts-grid',
    'dataProvider' => $dataProvider,
     'pager' =>false,
    ////'filter'=>$model,
    'columns' => array(
        'id',
        array(
            'attribute' => 'name',
            'header' => Yii::t('app', 'Name'),
            //'type' => 'raw',
            //'value' => '\yii\helpers\Html::link(\yii\helpers\Html::encode($data["name"]), yii\helpers\BaseUrl::base().("/accounts/transaction/".\yii\helpers\Html::encode($data["id"])))',
        ),
        //'type',
         
        array(
            //'cssClassExpression' => "'number'",
            'attribute'=>'transactions',
            'header' => Yii::t('app', 'Transaction Debt'),
        ),
        array(
            //'cssClassExpression' => "'number'"
            'header' => Yii::t('app', 'Proforma Debt'),
            'attribute'=>'doc',
        ),
        array(
            //'cssClassExpression' => "'number'",
            'attribute'=>'sum',
            'header' => Yii::t('app', 'Sum'),
        ),
    ),
));

app\widgets\MiniForm::end();
?>
