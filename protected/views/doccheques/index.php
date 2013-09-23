<?php
$this->breadcrumbs=array(
	'Doccheques',
);

$this->menu=array(
	array('label'=>'Create Doccheques', 'url'=>array('create')),
	array('label'=>'Manage Doccheques', 'url'=>array('admin')),
);
?>

<h1>Doccheques</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
