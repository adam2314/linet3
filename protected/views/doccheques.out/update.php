<?php
$this->breadcrumbs=array(
	'Doccheques'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Doccheques', 'url'=>array('index')),
	array('label'=>'Create Doccheques', 'url'=>array('create')),
	array('label'=>'View Doccheques', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Doccheques', 'url'=>array('admin')),
);
?>

<h1>Update Doccheques <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>