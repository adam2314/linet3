<?php
$this->breadcrumbs=array(
	'Fields',
);

$this->menu=array(
	array('label'=>'Create Fields', 'url'=>array('create')),
	array('label'=>'Manage Fields', 'url'=>array('admin')),
);
?>

<h1>Fields</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
