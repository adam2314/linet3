<?php
$this->params["breadcrumbs"]=array(
	'Currates'=>array('index'),
	$model->id,
);

$this->params["menu"]=array(
	array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>'Create Currates', 'url'=>array('create')),
	array('label'=>'Update Currates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Currates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Currates', 'url'=>array('admin')),
);
?>

<h1>View Currates #<?php echo $model->id; ?></h1>
<?php 
 app\widgets\MiniForm::begin(array(
    'header' => "Create Accounts",
   // 'width' => '800',
)); 
echo kartik\detail\DetailView::widget( array(
	'model'=>$model,
	'attributes'=>array(
		//'id',
		'currency_id',
		'date',
		'nisvalue',
	),
)); 
  app\widgets\MiniForm::end(); 
 
 
 ?>
