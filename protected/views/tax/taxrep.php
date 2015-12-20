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
    'header' => Yii::t('app', "Tax Report"),
));

$form = kartik\form\ActiveForm::begin(array(
            'id' => 'reporttaxrep-form',
            //'enableAjaxValidation'=>true,
            //'enableAjaxValidation' => true,
        ));
$year = date("Y");
$max = $year + 1;
$years = array();

for ($min = $year - 2; $min <= $max; $min++)
    $years[$min] = $min;
?>

<div class='row'>
    <div class='col-md-3'>
        <?php
        echo $form->field($model, 'from_month')->widget(kartik\select2\Select2::className(), ['data' => kartik\helpers\Enum::monthList()]);
        echo $form->field($model, 'year')->widget(kartik\select2\Select2::className(), ['data' => $years]);

        echo "<br>";

        echo $form->field($model, 'to_month')->widget(kartik\select2\Select2::className(), ['data' => kartik\helpers\Enum::monthList()]);
        ?>
        <div class="row form-actions">
            <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Go'), ['class' => 'btn btn-success']) ?>
        </div>



    </div>
</div>

<?php
kartik\form\ActiveForm::end();

app\widgets\MiniForm::end();
?>
