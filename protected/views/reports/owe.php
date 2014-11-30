<?php

$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "Customers owing money"),
));


$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'accounts-grid',
    'dataProvider' => $model->owes(),
    //'filter'=>$model,
    'columns' => array(
        'id',
        array(
            'name' => 'name',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data["name"]), Yii::app()->createAbsoluteUrl("/accounts/transaction/id/".CHtml::encode($data["id"])))',
        ),
        //'type',
         
        array(
            'cssClassExpression' => "'number'",
            'name'=>'sum',
        )
          
    ),
));

$this->endWidget();
?>
