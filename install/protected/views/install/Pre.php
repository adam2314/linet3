<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
?>
<h3><?= Yii::t("app", "Install Wizard");?>: <?=Yii::t("app", "Prerequisites");?></h3>
<div class="iPage">
    <?php
    echo yii\grid\GridView::widget( array(
        'id' => 'pre-grid',
        'dataProvider' => $model->report(),
        //'template' => '{items}',
        ////'filter'=>$model,
        'columns' => array(
            'id',
            'value',
        ),
    ));
    ?>

<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'install-form',
    'enableAjaxValidation' => false,
    'options' => array(
        //'onsubmit' => "return false;", /* Disable normal form submit */
        //'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
    ),
        ));


echo $form->field($model,'step',['template'=>"{input}"])->hiddenInput();
?>
    <div class="form-actions">
        <?= \yii\helpers\Html::submitButton(Yii::t("app", 'Next'), ['class' => 'btn btn-success']);?>
    </div>
<?php kartik\form\ActiveForm::end();?>

</div>