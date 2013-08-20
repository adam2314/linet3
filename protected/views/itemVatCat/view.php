<?php
$this->breadcrumbs=array(
	'Item Vat Cats'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>'Create ItemVatCat','url'=>array('create')),
	array('label'=>'Update ItemVatCat','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ItemVatCat','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ItemVatCat','url'=>array('admin')),
);
?>

<h1>View ItemVatCat #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
