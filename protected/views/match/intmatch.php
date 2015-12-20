<?php
$this->params["menu"]= array(
        //array('label'=>'List Doctype', 'url'=>array('index')),
        //array('label'=>'Create Doctype', 'url'=>array('create')),
);


app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', "Reconciliations"),
));
?>

<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'intmatch-form',
    //'enableAjaxValidation' => false,
    
        )
);
//$temp=\yii\helpers\ArrayHelper::map(Accounts::findAllByAttributes(array('type' => 1)), 'id', 'name');
$temp = array_merge(app\models\Accounts::find()->where(['type' => 1])->All(), app\models\Accounts::find()->where(['type' => 0])->All());
$temp = \yii\helpers\ArrayHelper::map($temp, 'id', 'name');
$temp[0] = Yii::t('app', 'Choose Account');
$model->account_id = 0;
//echo $form->error($model,'account_id'); 
echo $form->field($model, "account_id")->widget(kartik\select2\Select2::className(),['data'=>$temp]);
//echo $form->error($model,'account_id'); 
?>
<div id ="result">
</div>
<div class="row">
    <div class="col-md-3">
<?php
//echo $form->labelEx($model, 'in_total');
echo $form->field($model, 'in_total');
//echo $form->field($model, 'in_total');
//echo $form->labelEx($model, 'out_total');
echo $form->field($model, 'out_total');
//echo $form->error($model, 'out_total');
?>
    </div>  
</div>
<div class="form-actions">
    
    <?= \yii\helpers\Html::submitButton( Yii::t('app', 'Save'), ['class' =>  'btn btn-success']) ?>

</div>
    <?php
    kartik\form\ActiveForm::end();
    app\widgets\MiniForm::end();




\yii\jui\Dialog::begin(array(//
        'id' => "transactionDiag",

        'clientOptions' => array(
            'title' => Yii::t('app', 'Choose Reference Document'),
            'autoOpen' => false,
            'width' => 900,
        ),
    ));

    echo $this->render('//transaction/create', array('model' => new app\models\FormTransaction()));



    \yii\jui\Dialog::end();
    ?>
<?php
$java = <<<JS
$("#formintmatch-account_id").change(function() {
            var value = $("#formintmatch-account_id").val();
            $.post(baseAddress+"/match/intmatchajax", {FormIntmatch: {account_id: value}}).done(
                    function(data) {
                        $("#result").html(data);
                    }
            );

        });
        $("#intmatch-form").submit(function(e) {
            go(e);
        });
        
JS;
$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';".
    $java
, \yii\web\View::POS_READY);
?>

<script type="text/javascript">
    
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
        $("#formintmatch-in_total").val(total);
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
        $("#formintmatch-out_total").val(total);
        return total;
    }




</script>