<?php
/*$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->num=>array('view','id'=>$model->num),
	'Update',
);*/

$this->menu=array(
	//array('label'=>'List Accounts', 'url'=>array('index')),
	//array('label'=>'Create Accounts', 'url'=>array('create')),
	array('label'=>'View Account', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Accounts', 'url'=>array('admin')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => "Update Account $model->id",
    'width' => '800',
)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
 $this->endWidget(); 
?>
