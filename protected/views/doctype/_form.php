<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'doctype-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'openformat'); ?>
		<?php echo $form->textField($model,'openformat'); ?>
		<?php echo $form->error($model,'openformat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isdoc'); ?>
            

		<?php //echo $form->textField($model,'isdoc'); ?>
               <?php //$this->widget('toggleButton',array('model'=>$model,'field'=>'isdoc')); ?>

		<?php //echo $form->error($model,'isdoc'); ?>
	</div>
 
	<div class="row">
		<?php echo $form->labelEx($model,'isrecipet'); ?>
		<?php echo $form->textField($model,'isrecipet'); ?>
		<?php echo $form->error($model,'isrecipet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iscontract'); ?>
		<?php echo $form->textField($model,'iscontract'); ?>
		<?php echo $form->error($model,'iscontract'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stockAction'); ?>
		<?php echo $form->textField($model,'stockAction'); ?>
		<?php echo $form->error($model,'stockAction'); ?>
	</div>

	<div clasrow">
		<?php echo $form->labelEx($model,'account_type'); ?>
		<?php echo $form->dropDownList($model,'account_type',CHtml::listData(Acctype::model()->findAll(), 'id', 'name'));
                //echo $form->textField($model,'account_type'); ?>
		<?php echo $form->error($model,'account_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'docStatus_id'); ?>
		<?php echo $form->dropDownList($model,'docStatus_id',CHtml::listData(Docstatus::model()->findAllByAttributes(array('doc_type'=>$model->id)), 'num', 'name'));
                //echo $form->textField($model,'docStatus_id'); ?>
		<?php echo $form->error($model,'docStatus_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_docnum'); ?>
		<?php echo $form->textField($model,'last_docnum'); ?>
		<?php echo $form->error($model,'last_docnum'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->