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
    'header' => Yii::t('app', "Vat Report"),
));

$form = kartik\form\ActiveForm::begin(array(
            'id' => 'reportvat-form',
            //'enableAjaxValidation'=>true,
            //'clientOptions' => array(
            //    'validateOnSubmit' => true,
            //),
            //'enableAjaxValidation' => true,
            
        ));
$year = date("Y");
$max = $year + 1;
$years = array();

for ($min = $year - 2; $min <= $max; $min++)
    $years[$min] = $min;


//echo Yii::t('app','From Date');

echo $form->field($model,'year')->widget(kartik\select2\Select2::className(),['data'=> $years]);
echo $form->field($model, 'from_month')->widget(kartik\select2\Select2::className(),['data'=> kartik\helpers\Enum::monthList()]);
//echo $form->field($model, 'year')->widget(kartik\select2\Select2::className(),['data'=>  $years]);

echo "<br>";

//echo Yii::t('app','To Date');
echo $form->field($model, 'to_month')->widget(kartik\select2\Select2::className(),['data'=>  kartik\helpers\Enum::monthList()]);
//echo $form->dropDownList($model,'to_year', $years);  
?>
<div class="row form-actions">
     <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Go'), ['class' => 'btn btn-success']) ?>
    
</div>
<?php
//echo \yii\helpers\Html::submitButton('Go',array('onclick'=>'send();')); 

kartik\form\ActiveForm::end();

app\widgets\MiniForm::end();
?>
