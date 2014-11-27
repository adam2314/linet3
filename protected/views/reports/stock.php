<?php

$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            // 'model'=>$model,
            'name' => 'stockAction[from_date]',
            'language' => substr(Yii::app()->language, 0, 2),
            'value' => $model->from_date,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;width:70px;',
            ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                ), true) . '<br> To <br> ' . $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            // 'model'=>$model,
            'name' => 'stockAction[to_date]',
            'language' => substr(Yii::app()->language, 0, 2),
            'value' => $model->to_date,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;width:70px',
            ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                ), true);
?>

<?php

$this->beginWidget('MiniForm', array(
    'haeder' => Yii::t('app', "Stock Sum"),
        //'width' => '800',
));



$yiidbdatetime = Yii::app()->locale->getDateFormat('yiidbdatetime');
$phpdatetime = Yii::app()->locale->getDateFormat('phpdatetime');

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'stockAction-grid',
    'dataProvider' => $model->sum(),
    //'enablePagination'=> false,
    'ajaxUpdate' => true,
    'ajaxType' => 'POST',
    'filter' => $model,
    'columns' => array(
        //'id',


        array(
            'name' => 'account_id',
            //'filter'=>CHtml::dropDownList('Transactions[type]', $model->type,CHtml::listData(TransactionType::model()->findAll(), 'id', 'name')),
            'filter' => CHtml::listData(Accounts::model()->findAll(), 'id', 'name'),
            'value' => '$data->getAccountName()'
        ),
        'item_id',
        array(
            'name' => 'item_id',
            'filter' => CHtml::listData(Item::model()->findAll(), 'id', 'name'),
            'value' => '$data->getItemName()'
        ),
        array(
            'name' => 'qty',
            'value' => '$data->getItemSum()',
        )

    //'qtySum',
    ),
));


$this->endWidget(); //miniform
?>