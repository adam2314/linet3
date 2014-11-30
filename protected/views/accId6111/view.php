<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Id6111')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account Id6111'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Id6111'),'url'=>array('create')),
	array('label'=>Yii::t('app','Update Account Id6111'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','Delete Account Id6111'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Manage Account Id6111'),'url'=>array('admin')),
);


$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"View Account Id6111")." " .$model->id,

)); 

?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); 

 $this->endWidget(); 
?>
