<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
use kartik\select2\Select2;
$form=kartik\form\ActiveForm::begin(array(
	'id'=>'bank-name-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->field($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->field($model,'name'); ?>
        <?php echo $form->field($model, 'type_id')->widget(Select2::classname(), ['data' => \yii\helpers\ArrayHelper::map(app\models\Acctype::find()->All(), 'id', 'name')]); ?>   

	<div class="form-actions">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
	</div>

<?php kartik\form\ActiveForm::end(); ?>
