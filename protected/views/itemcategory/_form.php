<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'itemcategory-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profit'); ?>
		<?php echo $form->textField($model,'profit'); ?>
		<?php echo $form->error($model,'profit'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->