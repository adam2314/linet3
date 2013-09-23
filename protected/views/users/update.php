<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'View User','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage User','url'=>array('admin')),
);
$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Update User")." ". $model->username,)); 
?>


<?php echo $this->renderPartial('_form',array('model'=>$model)); 



$this->endWidget(); 
?>