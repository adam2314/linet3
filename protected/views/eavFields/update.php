<?php
$this->breadcrumbs=array(
	'Eav Fields'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EavFields','url'=>array('index')),
	array('label'=>'Create EavFields','url'=>array('create')),
	array('label'=>'View EavFields','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage EavFields','url'=>array('admin')),
);
?>

<h1>Update EavFields <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>