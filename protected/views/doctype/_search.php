<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'openformat'); ?>
		<?php echo $form->textField($model,'openformat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isdoc'); ?>
		<?php echo $form->textField($model,'isdoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isrecipet'); ?>
		<?php echo $form->textField($model,'isrecipet'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iscontract'); ?>
		<?php echo $form->textField($model,'iscontract'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stockAction'); ?>
		<?php echo $form->textField($model,'stockAction'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'account_type'); ?>
		<?php echo $form->textField($model,'account_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'docStatus_id'); ?>
		<?php echo $form->textField($model,'docStatus_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_docnum'); ?>
		<?php echo $form->textField($model,'last_docnum'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->