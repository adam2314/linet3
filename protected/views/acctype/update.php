<?php
$this->breadcrumbs=array(
	'Acctypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>'Create Acctype','url'=>array('create')),
	array('label'=>'View Acctype','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Acctype','url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => "Update Acctype",
    //'width' => '800',
)); 

?>

<h1>Update Acctype <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); 


 $this->endWidget(); 
?>