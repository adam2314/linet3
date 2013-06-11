<?php
$this->breadcrumbs=array(
	'Itemunits'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Itemunit', 'url'=>array('index')),
	array('label'=>'Create Itemunit', 'url'=>array('create')),
	array('label'=>'View Itemunit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Itemunit', 'url'=>array('admin')),
);
?>

<h1>Update Itemunit <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>