<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'item-form',
	'enableAjaxValidation'=>true,
)); ?>
<div class="row">
    <?php echo $form->errorSummary($model); ?>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->dropDownListRow($model,'itemVatCat_id',CHtml::listData(ItemVatCat::model()->findAll(), 'id', 'name')); ?>
        <br />
        <?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

        <?php echo $form->dropDownListRow($model,'category_id',$cat); ?>
        <br />

        <?php 
               
                $temp=CHtml::listData(Item::model()->findAll(), 'id', 'name');
                $temp[0]=Yii::t('app','None');
                
		
        ?>
        <?php echo $form->dropDownListRow($model,'parent_item_id',$temp); ?>	
        <br />
        <?php echo $form->checkboxRow($model,'isProduct',$temp); ?>	

        <?php echo $form->textFieldRow($model,'profit',array('class'=>'span5')); ?>

        <?php echo $form->dropDownListRow($model,'unit_id',$units); ?>
        <br />

        <?php echo $form->textFieldRow($model,'purchaseprice',array('class'=>'span5','maxlength'=>8)); ?>

        <?php echo $form->textFieldRow($model,'saleprice',array('class'=>'span5','maxlength'=>8)); ?>	

        <?php echo $form->dropDownListRow($model,'currency_id',CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name')); ?>
        <br />
        <?php echo $form->fileFieldRow($model,'pic',array('size'=>60,'maxlength'=>255)); ?>
	
    
        <?php echo $form->dropDownListRow($model,'stockType',array(0=>'no stock',1=>'qty',2=>'instanse')); ?>
        
        <br />
        <?php echo $form->textAreaRow($model,'description'); ?>

    </div>
    <div>
        <?php $this->beginWidget('application.modules.eav.components.eavProp',array(
            'name' => get_class($model),
            'attr' => $model->getEavAttributes(),
        )); 

         $this->endWidget();  ?>
    </div>
</div>
        <?php //echo $form->labelEx($model,'owner'); ?>
        <?php //echo $form->dropDownList($model,'owner',CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
        <?php //echo $form->error($model,'owner'); ?>
    

    <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'type'=>'primary',
                    'label'=>$model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
            )); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->