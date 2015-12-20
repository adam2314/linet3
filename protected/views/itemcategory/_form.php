<div class="form">
<?php
use yii\helpers\Html;
?>
<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'itemcategory-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->field($model,'name'); ?>
		<?php echo $form->field($model,'profit'); ?>
	

	<div class="form-actions">
		<?= Html::submitButton($model->isNewRecord ? Yii::t('app', "Create") : Yii::t('app', "Save"), ['class' => 'btn btn-success']) ?>
	</div>

<?php kartik\form\ActiveForm::end(); ?>

</div><!-- form -->