<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'currates-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	
		<?php echo $form->labelEx($model,'currency_id'); ?>
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
            
           
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'value'); ?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->