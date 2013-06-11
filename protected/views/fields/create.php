<?php
$this->breadcrumbs=array(
	'Fields'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fields', 'url'=>array('index')),
	array('label'=>'Manage Fields', 'url'=>array('admin')),
);
?>

<h1>Create Fields</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>