<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'fname',array('class'=>'span5','maxlength'=>80)); ?>
        
	<?php echo $form->textFieldRow($model,'lname',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>41)); ?>

	<?php echo $form->textFieldRow($model,'lastlogin',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cookie',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textFieldRow($model,'hash',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'certpasswd',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'salt',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

        
    <table  data-role="table" class="formtable" ><!-- docdetalies -->
        <thead>
            <tr  class="head1">
                <th><?php echo $form->labelEx($model,'ItemVatCat'); ?></th>
                <th><?php echo $form->labelEx($model,'account_id'); ?></th>
            </tr>
        </thead>	
        <tfoot>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </tfoot>	
        <tbody class="templateTarget">

                <?php 
                //$item=ItemVatCat::
                
                $i=0;
                if(count($model->userIncomeMaps)!=0)
                        //$docdetails=array(new UserIncomeMap);
                //print_r($model->userIncomeMaps);
                foreach ($model->userIncomeMaps as $userIncomeMap){
                        echo $this->renderPartial('userIncomeMap', array('model'=>$userIncomeMap,'form'=>$form,'i'=>"{$i}")); 
                        $i++;
                }
                ?>
        </tbody>


    </table><!-- doc detiales -->
        
        
        
<?php $this->endWidget(); ?>