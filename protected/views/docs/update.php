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
        array('label'=>'Duplicate Docs', 'url'=>array('duplicate','id'=>$model->id)),
);

$this->beginWidget('MiniForm',array(
    'haeder' => "Update $type->name",
    'width' => '800',
)); 
 echo $this->renderPartial('_form', array('model'=>$model,'docdetails'=>$docdetails,'type'=>$type,'docStatuss'=>$docStatuss)); 

$this->endWidget(); 
?>