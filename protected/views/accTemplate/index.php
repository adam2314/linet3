<?php
$this->breadcrumbs=array(
	'Acc Templates',
);

$this->menu=array(
	array('label'=>'Create AccTemplate','url'=>array('create')),
	array('label'=>'Manage AccTemplate','url'=>array('admin')),
);
?>

<h1>Acc Templates</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
