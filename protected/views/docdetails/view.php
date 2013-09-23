<?php
$this->breadcrumbs=array(
	'Docdetails'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Docdetails', 'url'=>array('index')),
	array('label'=>'Create Docdetails', 'url'=>array('create')),
	array('label'=>'Update Docdetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Docdetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Docdetails', 'url'=>array('admin')),
);
?>

<h1>View Docdetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'doc_id',
		'item_id',
		'name',
		'description',
		'qty',
		'unit_price',
		'currency',
		'price',
		'nisprice',
		'line',
	),
)); ?>
