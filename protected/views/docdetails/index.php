<?php
$this->breadcrumbs=array(
	'Docdetails',
);

$this->menu=array(
	array('label'=>'Create Docdetails', 'url'=>array('create')),
	array('label'=>'Manage Docdetails', 'url'=>array('admin')),
);
?>

<h1>Docdetails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
