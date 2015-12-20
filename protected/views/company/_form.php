<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->field($model,'string',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->field($model,'prefix',array('class'=>'span5','maxlength'=>40)); ?>

	<div class="form-actions">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
	</div>

<?php app\widgets\MiniForm::end(); ?>
