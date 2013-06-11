<?php
$this->breadcrumbs=array(
	'Docdetails'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Docdetails', 'url'=>array('index')),
	array('label'=>'Create Docdetails', 'url'=>array('create')),
	array('label'=>'View Docdetails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Docdetails', 'url'=>array('admin')),
);
?>

<h1>Update Docdetails <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>