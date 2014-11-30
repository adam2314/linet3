<?php
$this->breadcrumbs=array(
	'Eav Fields'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List EavFields','url'=>array('index')),
	array('label'=>Yii::t('app','Create EavFields'),'url'=>array('create')),
	//array('label'=>Yii::t('app','View EavFields'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage EavFields'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Update Eav Fields")." ".$model->id,
)); 

?>


<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

<?php $this->endWidget(); ?>