<?php
$this->breadcrumbs=array(
	'Currates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>'Create Currates', 'url'=>array('create')),
	array('label'=>'Update Currates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Currates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Currates', 'url'=>array('admin')),
);
?>

<h1>View Currates #<?php echo $model->id; ?></h1>
<?php 
 $this->beginWidget('MiniForm',array(
    'header' => "Create Accounts",
   // 'width' => '800',
)); 
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'currency_id',
		'date',
		'nisvalue',
	),
)); 
  $this->endWidget(); 
 
 
 ?>
