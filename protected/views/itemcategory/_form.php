<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'itemcategory-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->textFieldRow($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->textFieldRow($model,'profit'); ?>
	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->