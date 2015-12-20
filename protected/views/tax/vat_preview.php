<?php 
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Vat Report"),
)); 

$form=kartik\form\ActiveForm::begin( array(
    'id'=>'reportvat-form',
    //'enableAjaxValidation'=>true,
    
    'enableAjaxValidation'=>false,
        //'options'=>array(
        //                       'onsubmit'=>"return false;",/* Disable normal form submit */
          //                     'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
          //  ),
)); 
?>
<div class='row'>
<div class='col-md-3'>
<?php
echo Yii::t('app','From Date').": ".$model->from_month;

echo $form->field($model,'step')->hiddenInput();
echo $form->field($model,'from_month')->hiddenInput();
echo $form->field($model,'year')->hiddenInput();              

echo "<br>";

echo Yii::t('app','To Date').": ".$model->to_month;
echo $form->field($model,'to_month')->hiddenInput();
//echo $form->hiddenField($model,'to_year');  
echo "<br>";
echo $form->field($model,'selvat_acc')->hiddenInput();  
echo $form->field($model,'selvat_total');
echo $form->field($model,'income_sum');
echo $form->field($model,'income_sum_novat');
echo '<br />';



echo $form->field($model,'assetvat_acc')->hiddenInput();  
echo $form->field($model,'assetvat_total');

echo $form->field($model,'buyvat_acc')->hiddenInput();  
echo $form->field($model,'buyvat_total');
echo $form->field($model,'payvat_total');

//echo \yii\helpers\Html::submitButton('',array('onclick'=>'send();')); 
?>
<div class="row form-actions">
        <?php
        
        if($model->payvat_total<>0)
            echo \yii\helpers\Html::submitButton(Yii::t('app', 'Commit'), ['class' => 'btn btn-success']);
        ?>
    </div>
</div>
</div>
<?php
 kartik\form\ActiveForm::end(); 

app\widgets\MiniForm::end(); 
?>
