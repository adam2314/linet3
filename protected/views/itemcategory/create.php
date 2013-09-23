<?php
$this->breadcrumbs=array(
	'Itemcategories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Itemcategory', 'url'=>array('index')),
	array('label'=>'Manage Itemcategory', 'url'=>array('admin')),
);
?>

<h1>Create Itemcategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>