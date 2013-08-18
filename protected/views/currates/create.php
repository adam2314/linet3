<?php
/*$this->breadcrumbs=array(
	'Currates'=>array('index'),
	'Create',
);*/

$this->menu=array(
	array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>'Manage Currates', 'url'=>array('admin')),
);



$this->beginWidget('MiniForm',array(
    'haeder' => "Create Currates",
    //'width' => '800',
)); 
?>

<h1>Create Currates</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 


 $this->endWidget(); 

?>