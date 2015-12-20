<?php
/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Test Report"),
));

$form = kartik\form\ActiveForm::begin(array(
            'id' => 'reporttest-form',
            
        ));

//echo Yii::t('app','From Date');

echo $form->field($model,'docs')->hiddenInput();
echo $form->field($model,'transactions')->hiddenInput();
//echo $form->field($model, 'year')->widget(kartik\select2\Select2::className(),['data'=>  $years]);

echo "<br>";


//echo $form->dropDownList($model,'to_year', $years);  
?>
<div id="mainPage">
    
    
</div>
<div class="row form-actions">
     <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Go'), ['class' => 'btn btn-success']) ?>
    
</div>
<?php
//echo \yii\helpers\Html::submitButton('Go',array('onclick'=>'send();')); 

kartik\form\ActiveForm::end();

app\widgets\MiniForm::end();
?>
<?php
$java = <<<JS
        $("#reporttest-form").submit(function (e) {
        e.preventDefault();
            send();
        });
        
function send()
    {

        var data = $("#reporttest-form").serialize();


        $.ajax({
            type: 'POST',
            url: baseAddress+'/test/test',
            data: data,
            success: function (data) {
                //alert(data); 
                $('#mainPage').html(data);
            },
            error: function (data) { // if error occured
                //alert("Error occured.please try again");
                alert(data);
            },
            dataType: 'html'
        });
        return false;
    }
        
        
JS;

$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
        $java
        , \yii\web\View::POS_READY);
?>
