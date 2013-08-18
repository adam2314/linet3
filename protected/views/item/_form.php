<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'account_id'); ?>
		<?php 
				
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	    'name'=>'Item[account_id]',
	    'value'=>"$model->account_id",
	    'source'=>$this->createUrl('?r=accounts/Autocomplete&type=3'),//income
	    // additional javascript options for the autocomplete plugin
	    'options'=>array(
	            'showAnim'=>'fold',
	    ),
	));
		 ?>
		<?php echo $form->error($model,'account_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',$cat); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_item_id'); ?>
		<?php //echo $form->textField($model,'parent_item_id'); 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		    'name'=>'Item[parent_item_id]',
		    'value'=>"$model->parent_item_id",
		    'source'=>$this->createUrl('item/autocomplete'),//costumer
		    // additional javascript options for the autocomplete plugin
		    'options'=>array(
		            'showAnim'=>'fold',
		    ),
		));
		
		
		?>
		<?php echo $form->error($model,'parent_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isProduct'); ?>
		<?php echo $form->checkbox($model,'isProduct'); ?>
		<?php echo $form->error($model,'isProduct'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profit'); ?>
		<?php echo $form->textField($model,'profit'); ?>
		<?php echo $form->error($model,'profit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_id'); ?>
		<?php echo $form->dropDownList($model,'unit_id',$units);?>
		<?php echo $form->error($model,'unit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purchaseprice'); ?>
		<?php echo $form->textField($model,'purchaseprice',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'purchaseprice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saleprice'); ?>
		<?php echo $form->textField($model,'saleprice',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'saleprice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_id'); ?>
		<?php echo $form->dropDownList($model,'currency_id',CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name'));?>
		<?php echo $form->error($model,'currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic'); ?>
		<?php echo $form->fileField($model,'pic',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pic'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'stockType'); ?>
		<?php echo $form->dropDownList($model,'stockType',array(0=>'no stock',1=>'qty',2=>'instanse'));?>
		<?php echo $form->error($model,'stockType'); ?>
	</div>
        
	<div class="row">
	
		<?php $this->beginWidget('application.modules.eav.components.eavProp',array(
    'name' => get_class($model),
    'attr' => $model->getEavAttributes(),
)); 
// echo $this->renderPartial('_form', array('model'=>$model));  

 $this->endWidget(); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->