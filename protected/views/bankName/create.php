<?php
$this->breadcrumbs=array(
	'Bank Names'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BankName','url'=>array('index')),
	array('label'=>'Manage BankName','url'=>array('admin')),
);
?>

<h1>Create BankName</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>