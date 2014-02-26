<?php

$this->menu=array(
	array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>'Create Acctype','url'=>array('create')),
	array('label'=>'View Acctype','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Acctype','url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => "Update Account Type ". $model->id,
    //'width' => '800',
)); 

?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); 

 $this->endWidget(); 
?>