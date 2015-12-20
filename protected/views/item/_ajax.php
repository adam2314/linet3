<?php


echo app\widgets\GridView::widget( array(
    'id' => 'item-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'ajaxUpdate' => TRUE,
    'ajaxType' => 'POST',
    'columns' => array(
        'id',
        //'account_id',
        //array('name' => 'account_id','value' => '$data->Account->name',),
        'name',
        //'category_id',
        array(
            'name' => 'category_id',
            'filter' => \yii\helpers\ArrayHelper::map(Itemcategory::find()->All(), 'id', 'name'),
            'value' => 'isset($data->Category)?$data->Category->name:0', //where name is Client model attribute 
        ),
        'parent_item_id',
        'isProduct',
        'saleprice',
        /*
          'profit',
          'unit_id',
          'purchaseprice',

          'currency_id',
          'pic',
          'owner',
         */
        array(
            'class' => 'yii\grid\ActionColumn',
        ),
   
    ),
));
?>





