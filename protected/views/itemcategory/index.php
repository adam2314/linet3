<?php
$this->breadcrumbs=array(
	'Itemcategories',
);

$this->menu=array(
	array('label'=>'Create Itemcategory', 'url'=>array('create')),
	array('label'=>'Manage Itemcategory', 'url'=>array('admin')),
);
?>

<h1>Itemcategories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
