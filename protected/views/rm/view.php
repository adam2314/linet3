<?php
$this->breadcrumbs=array(
	'Acctypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>'Create Acctype','url'=>array('create')),
	array('label'=>'Update Acctype','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Acctype','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Acctype','url'=>array('admin')),
);
?>

<h1>View Acctype #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'desc',
		'openformat',
	),
)); ?>
