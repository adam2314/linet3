<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);

$this->menu=array(
	array('label'=>'List Docs', 'url'=>array('index')),
	array('label'=>'Create Docs', 'url'=>array('create')),
	array('label'=>'View Docs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Docs', 'url'=>array('admin')),
);
?>

<h1>Update <?php echo $type->name; //print_r($docdetails);?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'docdetails'=>$docdetails,'type'=>$type)); ?>