<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$dateisOn = kartik\datecontrol\DateControl::widget(['model' => $model,'attribute' => 'from_date','type' => 'date']) .
        kartik\datecontrol\DateControl::widget(['model' => $model,'attribute' => 'to_date','type' => 'date']);    
?>

<?php

app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', "Stock Sum"),
        //'width' => '800',
));




echo app\widgets\GridView::widget( array(
    'id' => 'stockAction-grid',
    'dataProvider' => $model->sum(),
    //'enablePagination'=> false,
    //'ajaxUpdate' => true,
    //'ajaxType' => 'POST',
    //'filter' => $model,
    'columns' => array(
        //'id',


        array(
            'attribute' => 'account_id',
            //'filter'=>\yii\helpers\Html::dropDownList('Transactions[type]', $model->type,\yii\helpers\ArrayHelper::map(TransactionType::find()->All(), 'id', 'name')),
            //'filter' => \yii\helpers\ArrayHelper::map(Accounts::find()->All(), 'id', 'name'),
            'value' => function($data){return $data->getAccountName();},
        ),
        'item_id',
        array(
            'attribute' => 'item_id',
            //'filter' => \yii\helpers\ArrayHelper::map(Item::find()->All(), 'id', 'name'),
            'value' => function($data){return $data->getItemName();},
        ),
        
        'sum'

    //'qtySum',
    ),
));


app\widgets\MiniForm::end(); //app\widgets\MiniForm
?>