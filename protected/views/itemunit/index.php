<?php
$this->breadcrumbs=array(
	'Itemunits',
);

$this->menu=array(
	array('label'=>'Create Itemunit', 'url'=>array('create')),
	array('label'=>'Manage Itemunit', 'url'=>array('admin')),
);
?>

<h1>Itemunits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
