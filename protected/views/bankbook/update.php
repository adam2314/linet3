<?php
$this->breadcrumbs=array(
	Yii::t('app','Bankbooks')=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Bankbooks'),'url'=>array('create')),
	array('label'=>Yii::t('app','Manage Bankbooks'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Update Bankbooks")." ".$model->id,
)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>