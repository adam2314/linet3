<?php
$this->breadcrumbs=array(
	'Fields'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Fields', 'url'=>array('index')),
	array('label'=>'Create Fields', 'url'=>array('create')),
	array('label'=>'Update Fields', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Fields', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fields', 'url'=>array('admin')),
);
?>

<h1>View Fields #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'tablename',
		'data',
		'desc',
		'sort',
		'minlen',
		'maxlen',
	),
)); ?>
