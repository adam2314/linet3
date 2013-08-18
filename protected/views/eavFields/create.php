<?php
$this->breadcrumbs=array(
	'Eav Fields'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EavFields','url'=>array('index')),
	array('label'=>'Manage EavFields','url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => "Create Eav Fields",
    //'width' => '800',
)); 
?>

<h1>Create EavFields</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 


$this->endWidget(); 
?>