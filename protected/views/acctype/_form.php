<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'acctype-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'desc',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'openformat',array('class'=>'span5','maxlength'=>5)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
