<?php
//echo $event->sender->menu->run();
//echo '<div>Step '.$event->sender->currentStep.' of '.$event->sender->stepCount;
//echo '<h3>'.$event->sender->getStepLabel($event->step).'</h3>';
//echo \yii\helpers\Html::tag('div',array('class'=>'form'),$form);


app\widgets\MiniForm::begin( array(
    'header' => Yii::t("app", "Install Wizard"),
));
?>

<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php
    echo app\widgets\GridView::widget( array(
        'id' => 'pre-grid',
        'dataProvider' => $model->report(),
        'template' => '{items}',
        ////'filter'=>$model,
        'columns' => array(
            'id',
            'value',
        ),
    ));
    ?>
</div>
<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'install-form',
    'enableAjaxValidation' => false,
    'options' => array(
        'onsubmit' => "return false;", /* Disable normal form submit */
        'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
    ),
        ));


//echo $form->hiddenfield($model,'step');

echo \yii\helpers\Html::submitButton(Yii::t("app", 'Next'), array('onclick' => 'send();'));

kartik\form\ActiveForm::end();






app\widgets\MiniForm::end();
?>


<script type="text/javascript">

    function send() {

        var data = $("#install-form").serialize();


        $.ajax({
            type: 'POST',
            url: '<?php echo yii\helpers\BaseUrl::base().("install/2"); ?>',
            data: data,
            success: function(data) {
                //alert(data); 
                $('.col-lg-12').html(data);
            },
            error: function(data) { // if error occured
                console.log(data);
                alert(data);
            },
            dataType: 'html'
        });

    }

</script>