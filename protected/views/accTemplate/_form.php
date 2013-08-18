<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'acc-template-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

        <?php
        $models = Acctype::model()->findAll(array('order' => 'name'));
        $list = CHtml::listData($models, 'id', 'name');
        $htmlOptions=array ( "class"=>'span5','id'=>ucfirst($this->id).'_AccType_id');
        $select=CHtml::dropDownList(ucfirst($this->id).'[AccType_id]', 0, $list, $htmlOptions );
        
        ?>
        <label for="AccTemplate_AccType_id" class="required">Acc Type <span class="required">*</span></label>
        <?php echo $select; ?>
            <?php //echo $form->textFieldRow($model,'AccType_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
