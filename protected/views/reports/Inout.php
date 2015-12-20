<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
app\widgets\MiniForm::begin(array('header' => Yii::t("app","In Out"))); 
?>
<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'inout-form',
	'enableAjaxValidation'=>false,
)); ?>
<?= $form->field($model, 'from_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
<?= $form->field($model, 'to_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
<br />
    <div class="form-actions">
            <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-success']) ?>
    </div>



<div id ="result">
</div>



<?php kartik\form\ActiveForm::end(); ?>



    <?php 
app\widgets\MiniForm::end(); 
?>
<?php
$java = <<<JS
        $("#inout-form").submit(function (e) {
            go(e);
        });
        
            function go(e) {
        e.preventDefault();

        var from = $("#formreportinout-from_date").val();
        var to = $("#formreportinout-to_date").val();
        $.post(baseAddress+ "/reports/inoutajax", {FormReportInout: {from_date: from, to_date: to}}).done(
                function (data) {
                    $("#result").html(data);
                }
        );

    }

        
JS;

$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
        $java
        , \yii\web\View::POS_READY);
?>
