<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fields-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tablename'); ?>
		<?php echo $form->textField($model,'tablename',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'tablename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model,'data',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textField($model,'desc',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minlen'); ?>
		<?php echo $form->textField($model,'minlen'); ?>
		<?php echo $form->error($model,'minlen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maxlen'); ?>
		<?php echo $form->textField($model,'maxlen'); ?>
		<?php echo $form->error($model,'maxlen'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->