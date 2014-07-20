<?php
$this->menu = array(
        //array('label'=>'List Doctype', 'url'=>array('index')),
        //array('label'=>'Create Doctype', 'url'=>array('create')),
);


$this->beginWidget('MiniForm', array(
    'haeder' => Yii::t('app', "Create deposit"),
));
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'deposit-form',
    'enableAjaxValidation' => true,
        )
);

$temp = CHtml::listData(Accounts::model()->AutoComplete('', 7), 'value', 'label');
$temp[0] = Yii::t('app', 'Chose Bank');
$model->account_id = 0;
?>
<div class='col-md-3'>

    <?php
    echo $form->dropDownList($model, "account_id", $temp, array('class' => ''));


    echo $form->labelEx($model, 'refnum');
    echo $form->textField($model, 'refnum', array('size' => 60, 'maxlength' => 100));
    echo $form->error($model, 'refnum');


    echo $form->labelEx($model, 'date');
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'FormDeposit[date]',
        'language' => substr(Yii::app()->language, 0, 2),
        'value' => $model->date,
        'defaultOptions' => array(// (#3)
            'dateFormat' => Yii::app()->locale->getDateFormat('short'),
        )
            )
    );
    echo $form->error($model, 'date');
    ?>
</div>
<div id ="result">

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'depsoit-grid',
        'dataProvider' => $cheques->search(),
        'columns' => array(
            array(
                'type' => 'raw',
                'value' =>
                'CHtml::checkBox("FormDeposit[Deposit][$data->doc_id,$data->line]",null,array("class"=>\'noPrint\', "onchange"=>"CalcSum()"))',
            ),
            array(
                'type' => 'raw',
                'value' =>
                'CHtml::hiddenField("FormDeposit[Total][$data->doc_id,$data->line]","$data->sum").CHtml::hiddenField("FormDeposit[Type][$data->doc_id,$data->line]","$data->type")',
            ),
            array(
                'name' => 'type',
                'type' => 'raw',
                'value' =>
                'Yii::t("app",$data->Type->name)',
            ),
            'bank_refnum',
            'bank',
            'branch',
            'cheque_acct',
            'cheque_num',
            'cheque_date',
            'dep_date',
            //'account_id',
            'currency_id',
            'refnum',
            'sum',
            //'total',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
            ),
        ),
    ));
    ?>

</div>
<div id="sum">
</div>
<div class='row'>
<div class='col-md-3'>
    <?php echo $form->textFieldRow($model, 'cheq_sum', array('maxlength' => 100)); ?>
    <?php echo $form->textFieldRow($model, 'cash_sum', array('maxlength' => 100)); ?>    
</div>
</div>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => Yii::t('app', "Deposit"),
    ));
    ?>
</div>
<?php
$this->endWidget();
$this->endWidget();
?>

<script type="text/javascript">
    /*
     jQuery(document).ready(function(){
     $( "#FormDeposit_account_id" ).change(function() {
     var value=$("#FormDeposit_account_id").val();
     
     $.post( "<?php echo $this->createUrl('/deposit/ajax'); ?>", { Deposit: {account_id: value}} ).done(
     function( data )
     {
     $( "#result" ).html( data );
     }
     
     );
     });
     
     
     
     });
     //*/
    
    function CalcSum() {
        var vals = $("[id^=FormDeposit_Deposit]");
        var total = $("[id^=FormDeposit_Total]");
        var types = $("[id^=FormDeposit_Type]");
        size = vals.length;
        //console.log("Length: " + size);
        cashsum = chqsum = sum = parseFloat("0.0");

        if (size) {
            for (x in vals) {
                //console.log("value: " + x + vals[x].checked);
                if (vals[x].checked) {


                    if ($(types[x]).val() == 1) {
                        cashsum+= parseFloat(total[x].value);

                    } else {

                        //console.log("value: " + total[x].value);
                        chqsum += parseFloat(total[x].value);

                    }
                }
            }
        }

        //console.log("sum: " + sum);
        $("#FormDeposit_cash_sum").val(cashsum);
        $("#FormDeposit_cheq_sum").val(chqsum);
    }




</script>