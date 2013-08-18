<?php
$this->breadcrumbs=array(
	'Doctypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>'Create Doctype', 'url'=>array('create')),
	array('label'=>'View Doctype', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Doctype', 'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array('haeder' => "Manage Currates",)); 
?>

<h1>Update Doctype <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget(); 
?>