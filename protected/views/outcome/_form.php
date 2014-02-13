<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'accounts-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'account_id'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name'=>'FormOutcome[account_id]',
                    'id'=>'FormOutcome_account_id',
                    'value'=>"$model->account_id",
                    'source'=>$this->createUrl('/accounts/autocomplete',array('type'=>1)),
                    'options'=>array(
                            'minLength'=>0,
                            'showAnim'=>'fold',
                    ),
                ));
		
		?>
		<?php echo $form->error($model,'account_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'type'); ?>
		<?php //echo $form->dropDownList($model,'type',CHtml::listData(Acctype::model()->findAll(), 'id', 'name')); ?>
		<?php //echo $form->error($model,'type'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'currency_id'); ?>
		<?php echo $form->dropDownList($model,'currency_id',CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name'));//currency ?>
		<?php echo $form->error($model,'currency_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sum'); ?>
		<?php echo $form->textField($model,'sum'); ?>
		<?php echo $form->error($model,'sum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detailes'); ?>
		<?php echo $form->textField($model,'detailes'); ?>
		<?php echo $form->error($model,'detailes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refnum'); ?>
		<?php echo $form->textField($model,'refnum',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'refnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(     // you must specify name or model/attribute
                            'name'=>'FormOutcome[date]',
                            'language' => 'en',
                            'options' => array(
                                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                             )
                        )
	        );?>
		<?php echo $form->error($model,'date'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'opp_account_id'); ?>
                <?php echo $form->dropDownList($model,'opp_account_id',CHtml::listData(Accounts::model()->findAllByAttributes(array('type'=>7)), 'id', 'name'));?>
		<?php echo $form->error($model,'opp_account_id'); ?>
	</div>

	        
	<div class="row">
		<?php //echo $form->labelEx($model,'owner'); ?>
                <?php //echo $form->dropDownList($model,'owner',CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
		<?php //echo $form->error($model,'owner'); ?>
	</div>

        
        
	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app',"Create")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->