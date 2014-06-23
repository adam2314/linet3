<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($user); ?>

	
        <?php echo $form->dropDownListRow($user,'user_id',CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
<br />
	<?php echo $form->textFieldRow($user,'level_id'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$user->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
