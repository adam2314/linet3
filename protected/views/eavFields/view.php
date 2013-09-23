<?php
$this->breadcrumbs=array(
	'Eav Fields'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EavFields','url'=>array('index')),
	array('label'=>'Create EavFields','url'=>array('create')),
	array('label'=>'Update EavFields','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete EavFields','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EavFields','url'=>array('admin')),
);
?>

<h1>View EavFields #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'eavType',
		'min',
		'max',
	),
)); ?>
