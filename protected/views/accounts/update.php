<?php
/*$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->num=>array('view','id'=>$model->num),
	'Update',
);*/

$this->menu=array(
	//array('label'=>'List Accounts', 'url'=>array('index')),
	//array('label'=>'Create Accounts', 'url'=>array('create')),
	array('label'=>Yii::t('app','View Account'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Accounts'), 'url'=>array('index')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Update Account"). " ". $model->id,
    
)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
 $this->endWidget(); 
?>
