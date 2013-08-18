<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>'Create Item', 'url'=>array('create')),
	array('label'=>'View Item', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Item', 'url'=>array('admin')),
);


$this->beginWidget('MiniForm',array(
    'haeder' => "Manage Items",
    //'width' => '800',
)); 
?>

<h1>Update Item <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'units'=>$units,'cat'=>$cat)); 

 $this->endWidget();

?>