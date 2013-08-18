<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'currates-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'id'); ?>
		<?php //echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
		<?php //echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_id'); ?>
		<?php //echo $form->textField($model,'currency_id',array('size'=>3,'maxlength'=>3)); ?>
		
            
                <?php

                $this->widget('ext.JAutoComplete', array(
                    'model'=>$model,
                    'attribute'=>'currency_id',
                    'name'=>'currency_autocomplete',
                    'source'=>$this->createUrl('currencies/Autocomplete'),  // Controller/Action path for action we created in step 4.
                    // additional javascript options for the autocomplete plugin
                    'options'=>array(
                        'minLength'=>'0',
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;',
                    ),        
                ));
                
                
                
                ?>
                <?php echo $form->error($model,'currency_id'); ?>
            
            
            
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'date'); ?>
		<?php //echo $form->textField($model,'date'); ?>
		<?php //echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nisvalue'); ?>
		<?php echo $form->textField($model,'nisvalue',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'nisvalue'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->