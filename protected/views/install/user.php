<?php


//exit;


$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t("app","Install Wizard"),
)); 

//$this->renderPartial('application.views.users._form',array('model'=>$model ));
///*
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'fname',array('class'=>'span5','maxlength'=>80)); ?>
        
	<?php echo $form->textFieldRow($model,'lname',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->passwordFieldRow($model,'passwd',array('class'=>'span5','maxlength'=>41)); ?>

	<?php echo $form->textFieldRow($model,'lastlogin',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cookie',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'hash',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'certpasswd',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'salt',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>

        <?php echo $form->dropDownListRow($model,'language',CHtml::listData(Language::model()->findAll(), 'id', 'name'));?>

        <?php echo $form->dropDownListRow($model,'timezone',Timezone::makeList());?>
        
        <?php echo $form->textFieldRow($model,'theme');?>
        <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
        
   <?php $this->endWidget(); //*/?>     
<?php $this->endWidget(); ?>