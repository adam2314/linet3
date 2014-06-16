<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'acchist-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php 
        $temp=CHtml::listData(Accounts::model()->findAll(), 'id', 'name');
        $temp[0]=Yii::t('app','Chose Account');
        
        
        ?>
        <?php echo $form->dropDownListRow($model,'account_id',$temp); ?>	
<br />
	<?php echo $form->textFieldRow($model,'dt',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'details',array('class'=>'span5','maxlength'=>5)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
