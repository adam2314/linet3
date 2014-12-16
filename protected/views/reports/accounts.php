<?php
$this->menu = array(
        //array('label'=>'List Config','url'=>array('index')),
        //array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
?>

<?php
$this->beginWidget('MiniForm', array('header' => Yii::t("app", "Bulk Balance")));
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'bulkBalance-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>
<div class='form-actions'>
    <div class='col-md-3'>
        <?php
        echo Yii::t('app', 'From Date');

        Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
        $this->widget('CJuiDateTimePicker', array(
            'model' => $model, //Model object
            'attribute' => 'from_date', //attribute name
            'mode' => 'date',
            'language' => substr(Yii::app()->language, 0, 2),
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
            ) // jquery plugin options
        ));
        ?>

        <br />
        <?php
        echo Yii::t('app', 'To Date');

        $this->widget('CJuiDateTimePicker', array(
            'model' => $model, //Model object
            'attribute' => 'to_date', //attribute name
            'mode' => 'date', //use "time","date" or "datetime" (default)
            'language' => substr(Yii::app()->language, 0, 2),
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
            ) // jquery plugin options
        ));

        ?>
        <?php echo $form->textFieldRow($model, 'acc'); ?>
        <?php echo Yii::t('app','Examples');?>: <br/>
        1-200<br/>
        1,3,5<br/>
        1-10,15-20,25-30<br/>
        
        <?php
        $temp = CHtml::listData(Acctype::model()->findAll(), 'id', 'name');
        $temp[""] = Yii::t('app', 'Choose Type');

        echo $form->dropDownListRow($model, 'type', $temp);
        ?>
        <div class="row form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            "icon" => "glyphicon glyphicon-eye-open",
            'label' => Yii::t('app', "Search"),
        ));
        ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'buttonType' => 'ajaxButton',
                "icon" => "glyphicon glyphicon-print",
                'label' => Yii::t('app', "Print"),
            ));
            ?>
        </div>



    </div>
</div>

<div class=''>
    <div id ="result">
    </div>
</div>


<?php $this->endWidget(); ?>



<?php
$this->endWidget();
?>


<script type="text/javascript">
    jQuery(document).ready(function() {
        $("#yt1").click(function(e) {
            window.print();
        });


        $("#bulkBalance-form").submit(function(e) {
            go(e);
        });
    });

    function go(e) {
        e.preventDefault();

        var from = $("#FormReportAccounts_from_date").val();
        var to = $("#FormReportAccounts_to_date").val();
        var acc = $("#FormReportAccounts_acc").val();
        var type = $("#FormReportAccounts_type").val();
        $.post("<?php echo $this->createUrl('/reports/accounts'); ?>", {FormReportAccounts: {from_date: from, to_date: to, acc: acc, type: type}}).done(
                function(data) {
                    $("#result").html(data);
                }
        );

    }

    $("#year").change(function() {
        var value = $("#year").val();
        $.post("<?php echo $this->createUrl('/reports/accounts'); ?>", {FormReportAccounts: {year: value}}).done(
                function(data) {
                    $("#result").html(data);
                }
        );

    });
</script>