<?php


$this->menu=array(
	//array('label'=>'List AccTemplate','url'=>array('index')),
	//array('label'=>'Manage AccTemplate','url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Restore Backup From File"),
)); 
?>
<div class="form">


<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'upload-form',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>
    <?php echo Yii::t('app','Worrinng:').Yii::t('app','All current compnay data will be removed:'); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file'); ?>
		<?php echo $form->error($model,'file'); ?>
		</div><!-- row -->	
    <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'type'=>'primary',
                    'label'=>Yii::t('app',"Upload") ,
            )); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->



<?php 
 $this->endWidget(); 
?>