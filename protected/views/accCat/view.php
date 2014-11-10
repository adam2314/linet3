<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Catagories')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account Catagories'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Catagory'),'url'=>array('create')),
	array('label'=>Yii::t('app','Update Account Catagory'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','Delete Account Catagory'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Manage Account Catagories'),'url'=>array('admin')),
);


$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"View Account Catagory")." " .$model->id,

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
