<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Templates')=>array('index'),
	$model->name=>array('update','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account Templates'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Templates'),'url'=>array('create')),
	array('label'=>Yii::t('app','View Account Templates'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Account Templates'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Update Account Template")." ".$model->name,
)); 

?>



<?php echo $this->renderPartial('_form',array('model'=>$model,'items'=>$items)); 
 $this->endWidget(); 

?>