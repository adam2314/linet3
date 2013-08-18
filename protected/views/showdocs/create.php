<?php
//$this->breadcrumbs=array('Docs'=>array('index'),'Create',);

$this->menu=array(
	array('label'=>'List Docs', 'url'=>array('index')),
	array('label'=>'Manage Docs', 'url'=>array('admin')),
);
?>



<?php 
$this->beginWidget('MiniForm',array(
    'haeder' => "Create $type->name",
    'width' => '800',
)); 
echo $this->renderPartial('_form', array('model'=>$model,'type'=>$type)); 
$this->endWidget(); 
?>