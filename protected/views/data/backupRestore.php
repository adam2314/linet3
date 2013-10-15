<?php


$this->menu=array(
	//array('label'=>'List AccTemplate','url'=>array('index')),
	//array('label'=>'Manage AccTemplate','url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Restore Backup From File"),
)); 
?>
<div class="form">


<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'upload-form',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>
		<div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file'); ?>
		<?php echo $form->error($model,'file'); ?>
		</div><!-- row -->	
<?php
	echo CHtml::submitButton(Yii::t('app', 'Upload'));
	$this->endWidget();
?>
</div><!-- form -->



<?php 
 $this->endWidget(); 
?>