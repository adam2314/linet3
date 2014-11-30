<?php
$this->menu = array(
        //array('label'=>'List Doctype', 'url'=>array('index')),
        //array('label'=>'Create Doctype', 'url'=>array('create')),
);


$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "Bankbooks"),
));
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'extmatch-form',
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    //'submitHandler'=>'js: go()',
    ),
        )
);

$temp = CHtml::listData(Accounts::model()->AutoComplete('', 7), 'value', 'label');
$temp[0] = Yii::t('app', 'Chose Bank');
$model->account_id = 0;
echo $form->error($extmatch, 'account_id');
echo $form->dropDownList($extmatch, "account_id", $temp, array('class' => ''));
echo $form->error($extmatch, 'account_id');
?>
<div id ="result">
</div>
<div class="row">
    <div class="col-md-3">
        <?php
        //echo $form->labelEx($extmatch, 'ext_total');
        echo $form->textFieldRow($extmatch, 'ext_total', array('size' => 60, 'maxlength' => 100));
        //echo $form->error($extmatch, 'ext_total');

        //echo $form->labelEx($extmatch, 'int_total');
        echo $form->textFieldRow($extmatch, 'int_total', array('size' => 60, 'maxlength' => 100));
        //echo $form->error($extmatch, 'int_total');
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
        $("#extmatch-form").submit(function(e) {
            go(e);
        });



        $("#FormExtmatch_account_id").change(function() {
            var value = $("#FormExtmatch_account_id").val();
            $.post("<?php echo $this->createUrl('/bankbook/extmatchajax'); ?>", {FormExtmatch: {account_id: value}}).done(
                    function(data) {
                        $("#result").html(data);
                    }
            );

        });
    });





    function ajaxSubmit(e) {
        e.preventDefault();
        var postData = $("#extmatch-form").serializeArray();
        //console.log(postData);
        //location.reload();
    }


    function go(e) {

        var extsum=parseFloat($('#FormExtmatch_ext_total').val());
        var intsum =parseFloat($('#FormExtmatch_int_total').val());
        var diff=extsum - intsum;
        if (diff != 0) {
            e.preventDefault();
            var sum = (-1) * (diff);
            //$(this).modal();
            //$('#modal-header').html("<h3><?php echo Yii::t("app", "Create Manual Transaction"); ?></h3>");
            //$('#modal-body').load("<?php echo $this->createUrl('/transaction/create'); ?> #transaction-form", {minmal: true});
            //$('#modal-footer').html("");
            //$('#modal').width("1000px");
            //try1();
            //$(#modal).modal('show');
            
            
            $("#Transactions_account_id").val($('#FormExtmatch_account_id').val());//bank_id
            $("#valuedate").val('<?php echo date(Yii::app()->locale->getDateFormat("phpshort"));?>');//=date
            $("#Transactions_refnum2").val();//=refnum
            if(diff<0){
                $("#sourceneg").val(diff*-1);
                $("#sourcepos").val(0);
            }else{
                $("#sourcepos").val(diff);
                $("#sourceneg").val(0);
            }
            

            $('#transactionDiag').dialog('open');

            $("#transaction-form").submit(ajaxSubmit(e));





        }

    }



    
     function CalcMatchSum() {
     var extsum = CalcExtSum();
     var intsum = CalcIntSum();
     
     
     console.log("sum: " + (extsum - intsum));
     }
     //*/
    function CalcExtSum() {
        var vals = $("[id^=FormExtmatch_Bankbook_match]");
        var sum = $("[id^=FormExtmatch_Bankbook_total]");

        total = parseFloat("0.0");

        for (x in vals) {
            if (vals[x].checked) {
                total += parseFloat(sum[x].value);
            }
        }

        total = Math.round(total * 100) / 100;
        $("#FormExtmatch_ext_total").val(total);
        return total;
    }

    function CalcIntSum() {
        var vals = $("[id^=FormExtmatch_Trans_match]");
        var sum = $("[id^=FormExtmatch_Trans_total]");

        total = parseFloat("0.0");
        for (x in vals) {
            if (vals[x].checked) {
                total += parseFloat(sum[x].value);
            }
        }
        total = Math.round(total * 100) / 100;
        $("#FormExtmatch_int_total").val(total);
        return total;
    }




</script>