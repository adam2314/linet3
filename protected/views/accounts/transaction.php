<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$dateisOn = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            // 'model'=>$model,
            'name' => 'Transactions[from_date]',
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
                //'style' => 'height:20px;width:70px;',
                'placeholder' => Yii::t('app', 'From Date'),
            ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                ), true) . $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            // 'model'=>$model,
            'name' => 'Transactions[to_date]',
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
                //'style' => 'height:20px;width:70px',
                'placeholder' => Yii::t('app', 'To Date'),
            ),
// DONT FORGET TO ADD TRUE this will create the datepicker return as string
                ), true);
?>

<?php

$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "Transactions for Account") . ": " . $account->name,
));

$yiidbdatetime = Yii::app()->locale->getDateFormat('yiidbdatetime');
$phpdatetime = Yii::app()->locale->getDateFormat('phpdatetime');
$this->widget('EExcelView', array(
    'id' => 'transactions-grid',
    'dataProvider' => $model->search(),
    
    //'enablePagination'=> false,
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'num',
            'value' => '$data->numLink()',
            'type' => 'raw',
        ),
        //'prefix',
        //'company',
        /*
        array(
            'value' => 'CHtml::link(CHtml::encode($data->getOptAccName()),Yii::app()->createAbsoluteUrl("/accounts/transaction/".$data->getOptAccId()))',
            'type' => 'raw',
        ),
        array(
            'name' => 'type',
            //'filter'=>CHtml::dropDownList('Transactions[type]', $model->type,CHtml::listData(TransactionType::model()->findAll(), 'id', 'name')),
            'value' => 'Yii::t("app",$data->Type->name)'
        ),*/
        array(
            'name' => 'refnum1',
            'value' => '$data->refnumDocsLink()',
            'type' => 'raw',
        ),
        array(
            'name' => 'refnum2',
            'value' => 'CHtml::encode($data->refnum2)',
            'type' => 'raw',
        ),
        'details',
        array(
            'name' => 'date',
            'filter' => $dateisOn,
            'value' => 'date("' . $phpdatetime . '",CDateTimeParser::parse($data->valuedate,"' . $yiidbdatetime . '"))'
        ),
        array(
            'name' => 'reg_date',
            'filter' => '',
            'value' => 'date("' . $phpdatetime . '",CDateTimeParser::parse($data->reg_date,"' . $yiidbdatetime . '"))'
        ),
        array(
            'header' => Yii::t('app', 'Debit'),
            'name' => 'sum',
            'filter' => '',
            'cssClassExpression' => "'number'",
            'value' => '($data->sum<0)?$data->sum:""'
        ),
        array(
            'header' => Yii::t('app', 'Credit'),
            'name' => 'sum',
            'filter' => '',
            'cssClassExpression' => "'number'",
            'value' => '($data->sum>0)?$data->sum:""'
        ),
        array(
            'header' => Yii::t('app', 'Balance'),
            'name' => 'sum',
            'filter' => '',
            'cssClassExpression' => "'number'",
            'value' => '$data->getBalance()'
        ),
    ),
));
?>
<div class="row form-actions">
        
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'buttonType' => 'ajaxButton',
                "icon" => "glyphicon glyphicon-print",
                'label' => Yii::t('app', "Print"),
            ));
            ?>
        </div>

<?php
$this->endWidget();
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $("#yt0").click(function(e) {
            window.print();
        });
    });
</script>