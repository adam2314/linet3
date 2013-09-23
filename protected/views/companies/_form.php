<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'companies-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>



	<div class="row">
	

		<?php //echo $form->labelEx($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
		<?php //echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'companyname'); ?>
		<?php echo $form->textField($model,'companyname',array('size'=>30,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'companyname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hasStock'); ?>
		<?php echo $form->checkBox($model,'hasStock'); ?>
		<?php //echo $form->textField($model,'hasStock'); ?>
		<?php echo $form->error($model,'hasStock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'regnum'); ?>
		<?php echo $form->textField($model,'regnum',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'regnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>40,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cellular'); ?>
		<?php echo $form->textField($model,'cellular',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cellular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web'); ?>
		<?php echo $form->textField($model,'web',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'web'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tax'); ?>
		<?php echo $form->textField($model,'tax',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'tax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'taxrep'); ?>
		<?php //echo $form->textField($model,'taxrep'); ?>
		<?php echo $form->checkBox($model,'taxrep'); ?>
		<?php echo $form->error($model,'taxrep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vat'); ?>
		<?php echo $form->textField($model,'vat',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'vat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vatrep'); ?>
		<?php //echo $form->textField($model,'vatrep'); ?>
		<?php echo $form->checkBox($model,'vatrep'); ?>
		<?php echo $form->error($model,'vatrep'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'template'); ?>
		<?php //echo $form->textField($model,'template',array('size'=>60,'maxlength'=>128)); ?>
		<?php //echo $form->error($model,'template'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>
		<?php echo $form->textArea($model,'logo',array('rows'=>6, 'cols'=>30)); ?>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'header'); ?>
		<?php //echo $form->textField($model,'header',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'header'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'footer'); ?>
		<?php //echo $form->textField($model,'footer',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'footer'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'doc_template'); ?>
		<?php //echo $form->textField($model,'doc_template',array('size'=>60,'maxlength'=>128)); ?>
		<?php //echo $form->error($model,'doc_template'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'receipt_template'); ?>
		<?php //echo $form->textField($model,'receipt_template',array('size'=>60,'maxlength'=>128)); ?>
		<?php //echo $form->error($model,'receipt_template'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'invoice_receipt_template'); ?>
		<?php //echo $form->textField($model,'invoice_receipt_template',array('size'=>60,'maxlength'=>128)); ?>
		<?php //echo $form->error($model,'invoice_receipt_template'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_id'); ?>
		<?php echo $form->textField($model,'currency_id',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bidi'); ?>
		<?php //echo $form->textField($model,'bidi'); ?>
		<?php echo $form->checkBox($model,'bidi'); ?>
		<?php echo $form->error($model,'bidi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit'); ?>
		<?php echo $form->textField($model,'credit'); ?>
		<?php echo $form->error($model,'credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credituser'); ?>
		<?php echo $form->textField($model,'credituser',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'credituser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditpwd'); ?>
		<?php echo $form->textField($model,'creditpwd',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'creditpwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditallow'); ?>
		<?php echo $form->textField($model,'creditallow',array('size'=>40,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'creditallow'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->