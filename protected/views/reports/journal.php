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
    'header' => Yii::t('app', "Transactions"),
        //'width' => '800',
));



$yiidbdatetime = Yii::app()->locale->getDateFormat('yiidbdatetime');
$phpdatetime = Yii::app()->locale->getDateFormat('phpdatetime');

$this->widget('EExcelView', array(//
    'id' => 'transactions-grid',
    'dataProvider' => $model->search(),
    'ajaxUpdate' => true,
    'ajaxType' => 'POST',
    'afterAjaxUpdate' => "function() {
						jQuery('#Transactions_from_date').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['" . substr(Yii::app()->language, 0, 2) . "'], {'showAnim':'fold','dateFormat':'" . Yii::app()->locale->getDateFormat('short') . "','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
						jQuery('#Transactions_to_date').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['" . substr(Yii::app()->language, 0, 2) . "'], {'showAnim':'fold','dateFormat':'" . Yii::app()->locale->getDateFormat('short') . "','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                }",
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'num',
            'htmlOptions' => array('style' => 'width:8%;'),
        ),
        array(
            'name' => 'type',
            //'filter'=>CHtml::dropDownList('Transactions[type]', $model->type,CHtml::listData(TransactionType::model()->findAll(), 'id', 'name')),
            'filter' => CHtml::listData(TransactionType::model()->findAll(), 'id', 'name'),
            'value' => 'Yii::t("app",$data->Type->name)',
            'htmlOptions' => array('style' => 'width:15%;'),
        ),
        array(
            'name' => 'account_id',
            'filter' => CHtml::listData(Accounts::model()->findAll(), 'id', 'name'),
            'value' => 'CHtml::link(CHtml::encode(isset($data->Account)?$data->Account->name:$data->account_id),Yii::app()->createAbsoluteUrl("/accounts/transaction/".$data->account_id))',
            'type' => 'raw',
            'htmlOptions' => array('style' => 'width:15%;'),
        //'value' => '$data->getOptAcc()',
        ),
        //'',
        array(
            'name' => 'refnum1',
            'value' => '$data->refnumDocsLink()',
            'filter'=>'',
            'type' => 'raw',
        ),
        array(
            'name' => 'refnum2',
            //'value' => 'CHtml::link(CHtml::encode($data->refnum2),Yii::app()->createAbsoluteUrl("/docs/view/$data->refnum2"))',
            'value' => 'CHtml::encode($data->refnum2)',
            'type' => 'raw',
        ),
        'details',
        array(
            'name' => 'valuedate',
            'filter' => $dateisOn,
            'value' => 'date("' . $phpdatetime . '",CDateTimeParser::parse($data->valuedate,"' . $yiidbdatetime . '"))',
            'htmlOptions' => array('style' => 'width:8%;'),
            ),
        array(
            'name' => 'reg_date',
            'filter' => '',
            'value' => 'date("' . $phpdatetime . '",CDateTimeParser::parse($data->reg_date,"' . $yiidbdatetime . '"))',
             'htmlOptions' => array('style' => 'width:8%;'),
        ),
        array(
            'header' => Yii::t('app', 'Debit'),
            'cssClassExpression' => "'number'",
            'name' => 'sum',
            'filter' => '',
            'value' => '($data->sum<0)?$data->sum:""'
        ),
        array(
            'header' => Yii::t('app', 'Credit'),
            'cssClassExpression' => "'number'",
            'name' => 'sum',
            'filter' => '',
            'value' => '($data->sum>0)?$data->sum:""'
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
$this->endWidget(); //miniform
?>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $("#yt0").click(function(e) {
            window.print();
        });
    });
</script>