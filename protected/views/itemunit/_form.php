<div class="form">

<?php $form=kartik\form\ActiveForm::begin( array(
	'id'=>'itemunit-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->field($model,'name'); ?>
		<?php echo $form->field($model,'precision'); ?>
	

	<div class="form-actions">
		<?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
	</div>

<?php kartik\form\ActiveForm::end(); ?>

</div><!-- form -->