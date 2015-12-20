<?php
$this->params["breadcrumbs"]=array(
	'Bank Names',
);

$this->params["menu"]=array(
	array('label'=>'Create BankName','url'=>array('create')),
	array('label'=>'Manage BankName','url'=>array('admin')),
);
?>

<h1>Bank Names</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
