<?php
$this->params["breadcrumbs"]=array(
	'Eav Fields',
);

$this->params["menu"]=array(
	array('label'=>'Create EavFields','url'=>array('create')),
	array('label'=>'Manage EavFields','url'=>array('admin')),
);
?>

<h1>Eav Fields</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
