<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "Customers owing money"),
));


$this->widget('EExcelView', array(
    'id' => 'accounts-grid',
    'dataProvider' => $model->owes(),
     'pager' =>false,
    //'filter'=>$model,
    'columns' => array(
        'id',
        array(
            'name' => 'name',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data["name"]), Yii::app()->createAbsoluteUrl("/accounts/transaction/".CHtml::encode($data["id"])))',
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
