<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'doccheques-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'doc_id'); ?>
		<?php echo $form->textField($model,'doc_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'doc_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditcompany'); ?>
		<?php echo $form->textField($model,'creditcompany'); ?>
		<?php echo $form->error($model,'creditcompany'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cheque_num'); ?>
		<?php echo $form->textField($model,'cheque_num',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cheque_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank'); ?>
		<?php echo $form->textField($model,'bank',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'bank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch'); ?>
		<?php echo $form->textField($model,'branch',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cheque_acct'); ?>
		<?php echo $form->textField($model,'cheque_acct',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'cheque_acct'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cheque_date'); ?>
		<?php echo $form->textField($model,'cheque_date'); ?>
		<?php echo $form->error($model,'cheque_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sum'); ?>
		<?php echo $form->textField($model,'sum',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'sum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_refnum'); ?>
		<?php echo $form->textField($model,'bank_refnum',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'bank_refnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dep_date'); ?>
		<?php echo $form->textField($model,'dep_date'); ?>
		<?php echo $form->error($model,'dep_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'line'); ?>
		<?php echo $form->textField($model,'line'); ?>
		<?php echo $form->error($model,'line'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->