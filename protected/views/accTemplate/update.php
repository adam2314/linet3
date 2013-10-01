<?php
$this->breadcrumbs=array(
	'Acc Templates'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccTemplate','url'=>array('index')),
	array('label'=>'Create AccTemplate','url'=>array('create')),
	array('label'=>'View AccTemplate','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage AccTemplate','url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Update Account Template #").$model->id,
)); 

?>



<?php echo $this->renderPartial('_form',array('model'=>$model)); 
 $this->endWidget(); 

?>