<?php
$this->breadcrumbs=array(
	'Doccheques'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Doccheques', 'url'=>array('index')),
	array('label'=>'Manage Doccheques', 'url'=>array('admin')),
);
?>

<h1>Create Doccheques</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>