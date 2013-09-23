<?php
$this->breadcrumbs=array(
	'Acctypes',
);

$this->menu=array(
	array('label'=>'Create Acctype','url'=>array('create')),
	array('label'=>'Manage Acctype','url'=>array('admin')),
);
?>

<h1>Acctypes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
