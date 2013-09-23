<?php
$this->breadcrumbs=array(
	'Itemcategories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Itemcategory', 'url'=>array('index')),
	array('label'=>'Create Itemcategory', 'url'=>array('create')),
	array('label'=>'Update Itemcategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Itemcategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Itemcategory', 'url'=>array('admin')),
);
?>

<h1>View Itemcategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'profit',
	),
)); ?>
