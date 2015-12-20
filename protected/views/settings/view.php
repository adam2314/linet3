<?php
use app\widgets\SettingsTbPanel;
app\widgets\MiniForm::begin( array('header' => Yii::t("app", "Update Configuration")));

$form = kartik\form\ActiveForm::begin( array(
    'id' => 'settings-form',
    //'enableAjaxValidation' => true,
    'options' => array('enctype' => 'multipart/form-data'),
        ));
?>  
<div class='row'>
    <div class='col-md-6'>
        <?= SettingsTbPanel::widget(array('header' => Yii::t('app', "General Business Details"), 'models' => $models, 'from' => 100, 'to' => 199)); ?>
    
        <?= SettingsTbPanel::widget(array('header' => Yii::t('app', "Contact Details"), 'models' => $models, 'from' => 400, 'to' => 499)); ?>
        
        <?= SettingsTbPanel::widget(array('header' => Yii::t('app', "Address Details"), 'models' => $models, 'from' => 300, 'to' => 399)); ?>
        
    </div>
    <div class='col-md-6'>
        
    
        <?= SettingsTbPanel::widget(array('header' => Yii::t('app', "Tax and Accounting Data"), 'models' => $models, 'from' => 200, 'to' => 249)); ?>
  
        <?= SettingsTbPanel::widget(array('header' => Yii::t('app', "Currency"), 'models' => $models, 'from' => 250, 'to' => 299)); ?>
    
        <?= SettingsTbPanel::widget(array('header' => Yii::t('app', "Outgoing Email Settings"), 'models' => $models, 'from' => 500, 'to' => 599)); ?>
    </div>
    <div class="row form-actions">
        <?= \yii\helpers\Html::submitButton( Yii::t('app', 'Save'), ['class' =>  'btn btn-success']) ?>
        
    </div>

</div>
<?php
kartik\form\ActiveForm::end();
app\widgets\MiniForm::end();
?>

<script type="text/javascript">
    

</script>



<?php

$java= <<<JAVA
        
        var val = true;
    function del() {
        $("input[id='Settings_company.logo_value']").attr('value', '');
    }


    $('input').change(function() {
        submits();

    });



    $("#settings-form").submit(function(event) {
        if (!val){
            event.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "fast");
        }


    });



    function submits() {
        var from = "ajax=settings-form&" + $("#settings-form").serialize();
        $.post(baseAddress+"/settings/admin", from,
                function(data) {
                    $('.help-block').html('');
                    $('.form-group').removeClass('has-error');
                    val = true;
                    $.each(data, function(key, value) {
                        val = false;
                        markMe(key, value[0]);

                    });

                    //if(val)
                    //    $("#settings-form").submit();
                }, "json")
                .error(function() {
                });
    }



    function markMe(fieldName, error) {
        field = document.getElementById("Settings_" + fieldName + "_em");
        $(field).html(error);
        $(field).parent().addClass('has-error');
        $(field).show();

    }
        
JAVA;


$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
            $java, \yii\web\View::POS_READY);




?>