<?php
$this->breadcrumbs=array(
	'Itemcategories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Itemcategory', 'url'=>array('index')),
	array('label'=>'Create Itemcategory', 'url'=>array('create')),
	array('label'=>'View Itemcategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Itemcategory', 'url'=>array('admin')),
);
?>

<h1>Update Itemcategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>