<?php
$this->params["breadcrumbs"]=array(
	//'Acctypes'=>array('index'),
	//$model->name,
);

$this->params["menu"]=array(
	//array('label'=>'List Acctype','url'=>'index'),
	//array('label'=>'Create Acctype','url'=>'create'),
	//array('label'=>'Update Acctype','url'=>'update/'.$model->id),
	//array('label'=>'Delete Acctype','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Acctype','url'=>'admin'),
);
?>

<h1>View Acctype #<?php echo $model->id; ?></h1>

<?= kartik\detail\DetailView::widget(array(
	'model'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'desc',
		'openformat',
	),
)); ?>
