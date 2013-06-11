<?php
$this->breadcrumbs=array(
	'Doctypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>'Create Doctype', 'url'=>array('create')),
	array('label'=>'Update Doctype', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Doctype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Doctype', 'url'=>array('admin')),
);
?>

<h1>View Doctype #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'openformat',
		'isdoc',
		'isrecipet',
		'iscontract',
		'stockAction',
		'account_type',
		'docStatus_id',
		'last_docnum',
	),
)); ?>
