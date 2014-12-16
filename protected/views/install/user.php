<?php
$this->beginWidget('MiniForm',array(
    'header' => Yii::t("app","Install Wizard"),
)); 

//$this->renderPartial('application.views.users._form',array('model'=>$model ));
///*
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
)); 


$model->language='he_il';
$model->timezone='Asia/Jerusalem';
?>

	<p class="help-block"><?php echo Yii::t('app',"Fields with");?> <span class="required">*</span> <?php echo Yii::t('app',"are required");?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'fname',array('maxlength'=>80)); ?>
        
	<?php echo $form->textFieldRow($model,'lname',array('maxlength'=>80)); ?>

	<?php echo $form->passwordFieldRow($model,'passwd',array('maxlength'=>41)); ?>

	<?php echo $form->textFieldRow($model,'email',array('maxlength'=>255)); ?>

        <?php echo $form->dropDownListRow($model,'language',CHtml::listData(Language::model()->findAll(), 'id', 'name'));?>

        <?php echo $form->dropDownListRow($model,'timezone',Timezone::makeList());?>
        
        <?php //echo $form->textFieldRow($model,'theme');?>
        <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('app','Create'),
		)); ?>
	</div>
        
   <?php $this->endWidget(); //*/?>     
<?php $this->endWidget(); ?>