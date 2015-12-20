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
    'header' => Yii::t('app',"Tax Report"),
)); 

$form= kartik\form\ActiveForm::begin(array(
    'id'=>'reporttaxrep-form',
   
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
//echo $form->hiddenField($model,'selvat_acc');  


//echo $form->labelEx($model,'selvat_total'); 
//echo $form->textField($model,'selvat_total');

echo $form->field($model,'income_sum');

echo $form->field($model,'tax_rate');

echo $form->field($model,'tax_sum');

//echo $form->labelEx($model,'income_sum_novat'); 
//echo $form->textField($model,'income_sum_novat');
echo '<br />';

echo $form->field($model,'custtax_sum');

echo $form->field($model,'custtax_total');

echo $form->field($model,'tax_total');

//echo $form->hiddenField($model,'assetvat_acc');  

//echo $form->labelEx($model,'assetvat_total'); 
//echo $form->textField($model,'assetvat_total');

//echo $form->hiddenField($model,'buyvat_acc');  

// $form->labelEx($model,'buyvat_total'); 
//echo $form->textField($model,'buyvat_total');

//echo $form->labelEx($model,'payvat_total'); 
//echo $form->textField($model,'payvat_total');

//echo \yii\helpers\Html::submitButton('Pay',array('onclick'=>'send();')); 
?>
     <div class="row form-actions">
         <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Commit'), ['class' => 'btn btn-success']) ?>
        
    </div>

<div id="mainPage">
         
        
    </div>

</div>
</div>
    
    
    <?php
kartik\form\ActiveForm::end(); 

app\widgets\MiniForm::end(); 
?>
