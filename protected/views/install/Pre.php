<?php
//echo $event->sender->menu->run();
//echo '<div>Step '.$event->sender->currentStep.' of '.$event->sender->stepCount;
//echo '<h3>'.$event->sender->getStepLabel($event->step).'</h3>';
//echo CHtml::tag('div',array('class'=>'form'),$form);


$this->beginWidget('MiniForm', array(
    'header' => Yii::t("app", "Install Wizard"),
));
?>

<div style=" width: 40%; display: inline-block; margin-right: 150px; ">
    <?php
    $this->widget('EExcelView', array(
        'id' => 'pre-grid',
        'dataProvider' => $model->report(),
        'template' => '{items}',
        //'filter'=>$model,
        'columns' => array(
            'id',
            'value',
        ),
    ));
    ?>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'install-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'onsubmit' => "return false;", /* Disable normal form submit */
        'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
    ),
        ));


//echo $form->hiddenfield($model,'step');

echo CHtml::submitButton(Yii::t("app", 'Next'), array('onclick' => 'send();'));

$this->endWidget();






$this->endWidget();
?>


<script type="text/javascript">

    function send() {

        var data = $("#install-form").serialize();


        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("install/2"); ?>',
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