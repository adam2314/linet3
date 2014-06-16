<?php


$this->menu=array(
	//array('label'=>'List AccTemplate','url'=>array('index')),
	//array('label'=>'Manage AccTemplate','url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Import open Format Files"),
)); 
?>
<div class="form">


<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'upload-form',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>
    <?php //echo Yii::t('app','Worrinng:').Yii::t('app','All current compnay data will be removed:'); ?>
		
		<?php echo $form->fileFieldRow($model,'iniFile'); ?>
		
		<?php echo $form->fileFieldRow($model,'bkmvFile'); ?>
		
<?php
	echo CHtml::submitButton(Yii::t('app', 'Upload'));
	$this->endWidget();
?>
</div><!-- form -->

<div id ="result">
</div>

<?php 
 $this->endWidget(); 
?>

<script type="text/javascript">
   
    
</script>