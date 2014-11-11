<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

        <?php echo $form->hiddenField($model,'files'); ?>

	<?php //echo $form->textFieldRow($model,'from',array('maxlength'=>255)); ?>

        <?php echo $form->textFieldRow($model,'to',array('maxlength'=>255)); ?>
        <?php //echo $form->dropDownListRow($model, 'entity_type', CHtml::listData($list, 'id', 'name')); ?>

        <?php //echo $form->dropDownListRow($model, 'entity_id', CHtml::listData(Acctype::model()->findAll(), 'id', 'name')); ?>
        <br />
	<?php echo $form->textFieldRow($model,'cc',array('maxlength'=>255)); ?>

        <?php echo $form->textFieldRow($model,'bcc',array('maxlength'=>255)); ?>
        <div id="files"></div>
        <?php echo $form->textFieldRow($model,'subject',array('maxlength'=>255)); ?>

        <?php $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'body',
        )); ?>

	<?php //echo $form->textFieldRow($model,'openformat',array('class'=>'span5','maxlength'=>5)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app',"Send") : Yii::t('app',"Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>

