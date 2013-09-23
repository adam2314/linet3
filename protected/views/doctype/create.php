<?php
$this->breadcrumbs=array(
	'Doctypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>'Manage Doctype', 'url'=>array('admin')),
);
?>

<h1></h1>

<?php 
$this->beginWidget('MiniForm',array(
    'haeder' => "Create Doctype",
    'width' => '800',
)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
 $this->endWidget(); 
?>