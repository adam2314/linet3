<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$this->menu = array(
        //array('label'=>'List Config','url'=>array('index')),
        //array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
$this->beginWidget('MiniForm', array('header' => Yii::t("app", "Balance report")));
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'balance-form',
    'enableAjaxValidation' => true,
        ));
?>
<div class='row'>
    <div class="row form-actions">
        <div class='col-md-3'>
            <?php
            echo Yii::t('app', 'From Date');

            Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker', array(
                'model' => $model, //Model object
                'attribute' => 'from_date', //attribute name
                'mode' => 'datetime',
                'language' => substr(Yii::app()->language, 0, 2),
                
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                ) // jquery plugin options
            ));
            ?>
            <?php
            echo Yii::t('app', 'To Date');

            $this->widget('CJuiDateTimePicker', array(
                'model' => $model, //Model object
                'attribute' => 'to_date', //attribute name
                'mode' => 'datetime', //use "time","date" or "datetime" (default)
                'language' => substr(Yii::app()->language, 0, 2),
                'options' => array(
                    'showAnim' => 'fold',
                    'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                ) // jquery plugin options
            ));
//echo CHtml::submitButton(Yii::t('app','Search')); 
            ?>


            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'ajaxButton',
                'type' => 'primary',
                'label' => Yii::t('app', "Search"),
                "icon" => "glyphicon glyphicon-search",
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'buttonType' => 'ajaxButton',
                //'htmlOptions' => array('onclick' => 'return send();',),
                "icon" => "glyphicon glyphicon-print",
                'label' => Yii::t('app', "Print"),
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'buttonType' => 'ajaxButton',
                //'htmlOptions' => array('onclick' => 'return send();',),
                "icon" => "glyphicon glyphicon-export",
                'label' => Yii::t('app', "Export To Excel"),
            ));
            ?>    
        </div>



    </div>
</div>


<div id ="result">
</div>



<?php $this->endWidget(); ?>



<?php
$this->endWidget();
?>


<script type="text/javascript">
    jQuery(document).ready(function() {
        $("#yt0").click(function(e) {
            var from = $("#FormReportBalance_from_date").val();
            var to = $("#FormReportBalance_to_date").val();
            $.post("<?php echo $this->createUrl('/reports/balanceajax'); ?>", {FormReportBalance: {from_date: from, to_date: to}}).done(
                    function(data) {
                        $("#result").html(data);
                    }
            );
        });


        $("#yt1").click(function(e) {
            window.print();
        });

        $("#yt2").click(function(e) {

            $("#balance-form").attr("action", $("#balance-form").attr("action") + "ajax?grid_mode=export");
            $('#balance-form').submit();



        });
    });

    $("#year").change(function() {
        var value = $("#year").val();
        $.post("<?php echo $this->createUrl('/reports/balanceajax'); ?>", {FormReportBalance: {year: value}}).done(
                function(data) {
                    $("#result").html(data);
                }
        );

    });
</script>