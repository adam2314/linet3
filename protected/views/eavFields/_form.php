<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'eav-fields-form',
	'enableAjaxValidation'=>false,
)); 
$model->min=0;
$model->max=255;
?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>



<?php echo $form->dropDownListRow($model, 'eavType', CHtml::listData(EavFields::model()->getTypes(), 'id', 'name')); ?>
	<?php 
        
        //CHtml::listData(, 'id', 'name');
        
        //echo $form->textFieldRow($model,'eavType',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->hiddenField($model,'min'); ?>

	<?php echo $form->hiddenField($model,'max'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
