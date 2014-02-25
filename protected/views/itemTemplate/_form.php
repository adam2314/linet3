<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'item-template-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

        <?php
        $models = Itemcategory::model()->findAll(array('order' => 'name'));
        $list = CHtml::listData($models, 'id', 'name');
        $htmlOptions=array ( "class"=>'span5','id'=>ucfirst($this->id).'_Itemcategory_id');
        $select=CHtml::dropDownList(ucfirst($this->id).'[Itemcategory_id]', 0, $list, $htmlOptions );
        
        ?>
            <label for="ItemTemplate_Itemcategory_id" class="required">Item Category <span class="required">*</span></label>
        <?php echo $select; ?>
            <?php //echo $form->textFieldRow($model,'AccType_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
