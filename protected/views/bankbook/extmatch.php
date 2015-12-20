<?php
$this->params["menu"]= array(
        //array('label'=>'List Doctype', 'url'=>array('index')),
        //array('label'=>'Create Doctype', 'url'=>array('create')),
);


app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', "Bank Account Reconciliations"),
));
?>

<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'extmatch-form',
    //'enableAjaxValidation' => true,
    //'clientOptions' => array(
    //    'validateOnSubmit' => true,
    //'submitHandler'=>'js: go()',
    //),
        )
);

$temp = \yii\helpers\ArrayHelper::map(app\models\Accounts::findAllByType(7), 'id', 'name');
$temp[0] = Yii::t('app', 'Choose Bank');
$model->account_id = 0;
//echo $form->error($extmatch, 'account_id');
echo $form->field($extmatch, "account_id")->widget(kartik\select2\Select2::className(),['data'=>$temp]);
//echo $form->error($extmatch, 'account_id');
?>
<div id ="result">
</div>
<div class="row">
    <div class="col-md-3">
        <?php
        //echo $form->labelEx($extmatch, 'ext_total');
        echo $form->field($extmatch, 'ext_total');
        //echo $form->error($extmatch, 'ext_total');
        //echo $form->labelEx($extmatch, 'int_total');
        echo $form->field($extmatch, 'int_total');
        //echo $form->error($extmatch, 'int_total');
        ?>
    </div>  
</div>
<div class="form-actions">
    <?= \yii\helpers\Html::submitButton( Yii::t('app', 'Save'), ['class' => 'btn btn-primery' ]) ?>
    
</div>

<?php
kartik\form\ActiveForm::end();
app\widgets\MiniForm::end();




\yii\jui\Dialog::begin( array(//
    'id' => "transactionDiag",
    'clientOptions' => array(
        'title' => Yii::t('app', 'Choose Reference Document'),
        'autoOpen' => false,
        'width' => 600,
    ),
));

echo $this->render('//transaction/create', array('model' => new app\models\FormTransaction()));

\yii\jui\Dialog::end();
?>
<?php
$java = <<<JS
$("#formextmatch-account_id").change(function() {
            var value = $("#formextmatch-account_id").val();
            $.post(baseAddress+"/bankbook/extmatchajax", {FormExtmatch: {account_id: value}}).done(
                    function(data) {
                        $("#result").html(data);
                    }
            );

        });
        
JS;
$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';".
    $java
, \yii\web\View::POS_READY);
?>


<script type="text/javascript">
    function CalcMatchSum() {
        var extsum = CalcExtSum();
        var intsum = CalcIntSum();


    }
    //*/
    function CalcExtSum() {
        var vals = $(".ext_match");
        var sum = $(".ext_total");

        total = parseFloat("0.0");

        for (x in vals) {
            if (vals[x].checked) {
                total += parseFloat(sum[x].value);
            }
        }

        total = Math.round(total * 100) / 100;
        $("#formextmatch-ext_total").val(total);
        return total;
    }

    function CalcIntSum() {
        var vals = $(".trans_match");
        var sum = $(".trans_total");

        total = parseFloat("0.0");
        for (x in vals) {
            if (vals[x].checked) {
                total += parseFloat(sum[x].value);
            }
        }
        total = Math.round(total * 100) / 100;
        $("#formextmatch-int_total").val(total);
        return total;
    }
</script>