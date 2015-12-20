<?php
/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
$this->params["menu"] = array(
        //array('label'=>'List Config','url'=>array('index')),
        //array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
?>

<?php
app\widgets\MiniForm::begin(array('header' => Yii::t("app", "Profit & Loss report")));
?>
<?php
$form = kartik\form\ActiveForm::begin(array(
            'id' => 'profloss-form',
            'enableAjaxValidation' => false,
        ));
?>
<div class='row'>
    <div class='col-md-3'>
        <?= $form->field($model, 'from_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
        <?= $form->field($model, 'to_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
        <div class="row form-actions">

            <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-success']) ?>
        </div>



    </div>
</div>

<div class='row'>
    <div id ="result">
    </div>
</div>


<?php kartik\form\ActiveForm::end(); ?>



<?php app\widgets\MiniForm::end(); ?>


