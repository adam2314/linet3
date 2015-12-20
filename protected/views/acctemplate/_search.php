<?php $form=kartik\form\ActiveForm::begin(array(
	'action'=>yii\helpers\BaseUrl::base().($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->field($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->field($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->field($model,'AccType_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Search',
		)); ?>
	</div>

<?php app\widgets\MiniForm::end(); ?>
