<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'accounts-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'id'); ?>
		<?php //echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
		<?php //echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'prefix'); ?>
		<?php //echo $form->textField($model,'prefix',array('size'=>40,'maxlength'=>40)); ?>
		<?php //echo $form->error($model,'prefix'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',CHtml::listData(Acctype::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'currency_id'); ?>
		<?php echo $form->dropDownList($model,'currency_id',CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name'));//currency ?>
		<?php echo $form->error($model,'currency_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'id6111'); ?>
		<?php echo $form->dropDownList($model,'id6111',CHtml::listData(AccId6111::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'id6111'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_terms'); ?>
		<?php echo $form->textField($model,'pay_terms'); ?>
		<?php echo $form->error($model,'pay_terms'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'src_tax'); ?>
		<?php echo $form->textField($model,'src_tax',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'src_tax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'src_date'); ?>
		<?php //echo $form->textField($model,'src_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(     // you must specify name or model/attribute
	        'name'=>'src_date',
	        'language' => 'en',
	        'options' => array(
	            //'dateFormat'=>'dd-mm-yy',
                    'dateFormat' => Yii::app()->locale->getDateFormat('short'),
	            //'changeMonth' => 'true',
	            //'changeYear' => 'true',
	            //'showButtonPanel' => 'true',
	            //'constrainInput' => 'false',
	            //'duration'=>'fast',
	            //'showAnim' =>'slide',
	       	 )
	       	 )
	        );?>
		<?php echo $form->error($model,'src_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'grp'); ?>
		<?php //echo $form->textField($model,'grp',array('size'=>60,'maxlength'=>80)); ?>
		<?php //echo $form->error($model,'grp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vatnum'); ?>
		<?php echo $form->textField($model,'vatnum',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'vatnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dir_phone'); ?>
		<?php echo $form->textField($model,'dir_phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'dir_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cellular'); ?>
		<?php echo $form->textField($model,'cellular',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'cellular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web'); ?>
		<?php echo $form->textField($model,'web',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'web'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

        <div class="row">
	
		<?php $this->beginWidget('application.modules.eav.components.eavProp',array(
    'name' => get_class($model),
    'attr' => $model->getEavAttributes(),
)); 

 $this->endWidget(); ?>
	</div>
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'owner'); ?>
                <?php //adam: echo $form->dropDownList($model,'owner',CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div>

        
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->