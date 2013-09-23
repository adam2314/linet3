<?php
$this->breadcrumbs=array(
	'Itemunits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Itemunit', 'url'=>array('index')),
	array('label'=>'Manage Itemunit', 'url'=>array('admin')),
);
?>

<h1>Create Itemunit</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>