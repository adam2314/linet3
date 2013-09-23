<?php

$this->menu=array(
	//array('label'=>'List Config','url'=>array('index')),
	//array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Update Configuration"))); 
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>


<?php 
foreach($models as $model){
	 echo $form->errorSummary($model); 

        echo "<p>".Yii::t('app',$model->id); 
        echo $form->textField($model,'['.$model->id.']value',array('size'=>30,'maxlength'=>80))."</p>"; 

	
} 
?>  
<?php echo CHtml::submitButton('Save'); ?>    
<?php $this->endWidget(); ?>



    <?php 
$this->endWidget(); 
?>