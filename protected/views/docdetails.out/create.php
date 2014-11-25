<?php
$this->breadcrumbs=array(
	'Docdetails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Docdetails', 'url'=>array('index')),
	array('label'=>'Manage Docdetails', 'url'=>array('admin')),
);
?>

<h1>Create Docdetails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>