<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'doctype-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

    
    
        <?php echo $form->textFieldRow($model,'name',array('maxlength'=>255)); ?>
        <?php echo $form->textFieldRow($model,'openformat'); ?>
	

	
               <?php echo $form->checkboxRow($model,'isdoc'); ?>

		<?php echo $form->checkboxRow($model,'isrecipet'); ?>
	
		<?php //echo $form->checkboxRow($model,'iscontract'); ?>
	

		<?php //echo $form->textFieldRow($model,'stockAction'); ?>
	
		<?php echo $form->dropDownListRow($model,'account_type',CHtml::listData(Acctype::model()->findAll(), 'id', 'name'));?>
                <br />
		<?php echo $form->dropDownListRow($model,'docStatus_id',CHtml::listData(Docstatus::model()->findAllByAttributes(array('doc_type'=>$model->id)), 'num', 'name'));?>
	<br />
		<?php echo $form->textFieldRow($model,'last_docnum'); ?>
	
        <?php echo $form->labelEx($model,'header');?>
        <?php 
        $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'header',
        ));
        ?>
        
        <?php echo $form->labelEx($model,'footer');?>
        <?php 
        $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'footer',
        ));
        ?>
    
        
        
        
	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'type'=>'primary',
                    'label'=>$model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
            )); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->