<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>
	
	
		<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions); ?>
		<?php echo $form->error($model, 'itemname'); ?>
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton(Rights::t('core', 'Assign')); ?>
	</div>
<br /><br /><br /><br /><br /><br />
<?php $this->endWidget(); ?>

</div>