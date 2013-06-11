<?php
$this->breadcrumbs=array(
	'Currates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>'Manage Currates', 'url'=>array('admin')),
);
?>

<h1>Create Currates</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>