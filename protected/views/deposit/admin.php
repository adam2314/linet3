<?php

use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use app\models\Accounts;

$this->params["menu"] = array(
        //array('label'=>'List Doctype', 'url'=>array('index')),
        //array('label'=>'Create Doctype', 'url'=>array('create')),
);


app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Create deposit"),
));
?>

<?php
$form = kartik\form\ActiveForm::begin(array(
            'id' => 'deposit-form',
            'enableAjaxValidation' => true,
                )
);

$temp = \yii\helpers\ArrayHelper::map(Accounts::findAllByType(7), 'id', 'name');
$temp[''] = Yii::t('app', 'Choose Bank');
//$model->account_id = 0;
?>


<div class='row'>
    <div class='col-md-3'>

        <?= $form->field($model, "account_id")->widget(Select2::className(), ['data' => $temp]); ?>
        <?= $form->field($model, 'refnum'); ?>
        <?= $form->field($model, 'date')->widget(DateControl::classname(), ['type' => 'date']); ?>

    </div>
    <div class='col-md-3'>
        <?= $form->field($model, 'cheq_sum')->textInput([ 'readonly' => true,]); ?>
        <?= $form->field($model, 'cash_sum')->textInput([ 'readonly' => true,]); ?>    
    </div>
    <div class='col-md-3'>
        <?= $form->field($model, 'cheq_count')->textInput([ 'readonly' => true,]); ?>
        <?= $form->field($model, 'cash_count')->textInput([ 'readonly' => true,]); ?>    
    </div>
</div>

<div class="form-actions">
<?= \yii\helpers\Html::submitButton(Yii::t('app', 'Deposit'), ['class' => 'btn btn-success']) ?>


    <div id ="result">

        <?php
        //echo app\widgets\GridView::widget( array(
        echo yii\grid\GridView::widget(array(
            'id' => 'depsoit-grid',
            'dataProvider' => $cheques->depositSearch(),
            'columns' => array(
                array(
                    //'type' => 'raw',
                    'value' => function ($data) {
                        return \yii\helpers\Html::checkBox("FormDeposit[Deposit][$data->doc_id,$data->line]", false, ['id' => 'FormDeposit_Deposit-' . $data->doc_id . "_" . $data->line]) .
                                \yii\helpers\Html::hiddenInput("FormDeposit[Total][$data->doc_id,$data->line]", "$data->sum", ['id' => 'FormDeposit_Total-' . $data->doc_id . "_" . $data->line]) .
                                \yii\helpers\Html::hiddenInput("FormDeposit[Type][$data->doc_id,$data->line]", "$data->type", ['id' => 'FormDeposit_Type-' . $data->doc_id . "_" . $data->line]);
                    },
                            'filter' => '',
                            'format' => 'raw',
                        ),
                        //array(
                        //'type' => 'raw',
                        //'value' => '',
                        //),
                        array(
                            'attribute' => 'type',
                            //'type' => 'raw',
                            'value' => function($data) {
                                return Yii::t("app", $data->typeo->name);
                            },
                        ),
                        array(
                            //'attribute' => 'Details',
                            //'header' => Yii::t('app', 'Details'),
                            'value' => function($data) {
                                return $data->printDetails();
                            },
                        ),
                        //'bank_refnum',
                        //'bank',
                        //'branch',
                        //'cheque_acct',
                        //'cheque_num',
                        //'cheque_date',
                        //'dep_date',
                        //'account_id',
                        'currency_id',
                        //'refnum',
                        'sum',
                        //'total',
                        array(
                            'class' => 'yii\grid\ActionColumn',
                        ),
                    ),
                ));
                ?>

            </div>
            <div id="sum">
            </div>
        </div>
        <?php
        kartik\form\ActiveForm::end();
        ?>

        <?php
        app\widgets\MiniForm::end();


        $this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
                '$(document).on("click","input",function () {CalcSum();});'
                , \yii\web\View::POS_READY);
        ?>

<script type="text/javascript">


    function CalcSum() {
        var vals = $("[id^=FormDeposit_Deposit-]");
        //var total = $("[id^=FormDeposit_Total]");
        //var types = $("[id^=FormDeposit_Type]");
        size = vals.length;
        //console.log("Length: " + size);
        cashsum = chqsum = sum = parseFloat("0.0");
        cashcount =chqcount=0;
        if (size) {
            vals.each(function (index) {
                //for (x in vals) {

                //console.log("value: " + x + vals[x].checked);
                if (this.checked) {


                    var total = $(this).next();
                    var types = $(this).next().next();
                    if ($(types).val() == 1) {
                        cashsum += parseFloat($(total).val());
                        cashcount++;
                    } else {

                        //console.log("value: " + total[x].value);
                        chqsum += parseFloat($(total).val());
                        chqcount++;
                    }
                }
            });
        }

        console.log("sum: " + cashsum);
        console.log("sum: " + chqsum);
        $("#formdeposit-cash_sum").val(cashsum);
        $("#formdeposit-cheq_sum").val(chqsum);
        $("#formdeposit-cheq_count").val(chqcount);
        $("#formdeposit-cash_count").val(cashcount);
    }




</script>