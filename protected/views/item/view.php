<?php
//$this->breadcrumbs=array(
//	'Items'=>array('index'),
//	$model->name,
//);

$this->menu=array(
	array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>'Create Item', 'url'=>array('create')),
	array('label'=>'Update Item', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Item', 'url'=>array('admin')),
);
?>

<h1>View Item <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'account_id',
		'name',
		'category_id',
		'parent_item_id',
		'isProduct',
		'profit',
		'unit_id',
		'purchaseprice',
		'saleprice',
		'currency_id',
		'pic',
		//'owner',
	),
)); ?>
