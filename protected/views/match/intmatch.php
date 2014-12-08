<?php
$this->menu = array(
        //array('label'=>'List Doctype', 'url'=>array('index')),
        //array('label'=>'Create Doctype', 'url'=>array('create')),
);


$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "Reconciliations"),
));
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'intmatch-form',
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    //'submitHandler'=>'js: go()',
    ),
        )
);
//$temp=CHtml::listData(Accounts::model()->findAllByAttributes(array('type' => 1)), 'id', 'name');
//$temp=CHtml::listData(Accounts::model()->findAllByAttributes(array('type' => 0)), 'id', 'name');
$temp = array_merge(Accounts::model()->findAllByAttributes(array('type' => 1)), Accounts::model()->findAllByAttributes(array('type' => 0)));
$temp = CHtml::listData($temp, 'id', 'name');
$temp[0] = Yii::t('app', 'Choose Account');
$model->account_id = 0;
//echo $form->error($model,'account_id'); 
echo $form->dropDownListRow($model, "account_id", $temp, array('class' => ''));
//echo $form->error($model,'account_id'); 
?>
<div id ="result">
</div>
<div class="row">
    <div class="col-md-3">
<?php
//echo $form->labelEx($model, 'in_total');
echo $form->textFieldRow($model, 'in_total', array('size' => 60, 'maxlength' => 100));
//echo $form->textFieldRow($model, 'in_total');
//echo $form->labelEx($model, 'out_total');
echo $form->textFieldRow($model, 'out_total', array('size' => 60, 'maxlength' => 100));
//echo $form->error($model, 'out_total');
?>
    </div>  
</div>
<div class="form-actions">
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => Yii::t('app', "Save"),
));
?>
</div>
    <?php
    $this->endWidget();
    $this->endWidget();




    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(//
        'id' => "transactionDiag",
        'options' => array(
            'title' => Yii::t('app', 'Choose Reference Document'),
            'autoOpen' => false,
            'width' => '600px',
        ),
    ));

    echo $this->renderPartial('application.views.transaction.create', array('model' => new Transactions()));



    $this->endWidget('zii.widgets.jui.CJuiDialog');
    ?>


<script type="text/javascript">
    jQuery(document).ready(function() {
        $("#intmatch-form").submit(function(e) {
            go(e);
        });



        $("#FormIntmatch_account_id").change(function() {
            var value = $("#FormIntmatch_account_id").val();
            $.post("<?php echo $this->createUrl('/match/intmatchajax'); ?>", {FormIntmatch: {account_id: value}}).done(
                    function(data) {
                        $("#result").html(data);
                    }
            );

        });
    });




    function CalcMatchSum() {
        var insum = CalcInSum();
        var outsum = CalcOutSum();

    }
    //*/
    function CalcInSum() {
        var vals = $(".In_match");
        var sum = $(".In_total");

        total = parseFloat("0.0");

        for (x in vals) {
            if (vals[x].checked) {
                total += parseFloat(sum[x].value);
            }
        }

        total = Math.round(total * 100) / 100;
        $("#FormIntmatch_in_total").val(total);
        return total;
    }

    function CalcOutSum() {
        var vals = $(".Out_match");
        var sum = $(".Out_total");

        total = parseFloat("0.0");
        for (x in vals) {
            if (vals[x].checked) {
                total += parseFloat(sum[x].value);
            }
        }
        total = Math.round(total * 100) / 100;
        $("#FormIntmatch_out_total").val(total);
        return total;
    }




</script>