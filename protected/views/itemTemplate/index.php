<?php

$this->menu=array(
	array('label'=>'Create AccTemplate','url'=>array('create')),
	array('label'=>'Manage AccTemplate','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
