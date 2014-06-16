<?php
$this->menu=array(
	array('label'=>'Create Account Type','url'=>array('create')),
	array('label'=>'Manage Accounts Type','url'=>array('admin')),
);
?>

<h1>Account Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
