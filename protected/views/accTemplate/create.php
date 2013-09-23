<?php
$this->breadcrumbs=array(
	'Acc Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccTemplate','url'=>array('index')),
	array('label'=>'Manage AccTemplate','url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => "Create AccTemplate",
)); 
?>

<h1>Create AccTemplate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget(); 
?>