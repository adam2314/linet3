<?php
$this->breadcrumbs=array(
	'Item Vat Cats'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>'Create ItemVatCat','url'=>array('create')),
	array('label'=>'View ItemVatCat','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ItemVatCat','url'=>array('admin')),
);
?>

<h1>Update ItemVatCat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>