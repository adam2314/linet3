<?php
$this->params["breadcrumbs"]=array(
	'Item Vat Cats',
);

$this->params["menu"]=array(
	array('label'=>'Create ItemVatCat','url'=>array('create')),
	array('label'=>'Manage ItemVatCat','url'=>array('admin')),
);
?>

<h1>Item Vat Cats</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
