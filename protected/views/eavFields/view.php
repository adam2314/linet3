<?php

$this->menu=array(
	//array('label'=>'List EavFields','url'=>array('index')),
	array('label'=>Yii::t('app','Create EavFields'),'url'=>array('create')),
	array('label'=>Yii::t('app','Update EavFields'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','Delete EavFields'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Manage EavFields'),'url'=>array('admin')),
);


$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"View Eav Field #"). " ".$model->id,
    //'width' => '800',
)); 
?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'eavType',
		'min',
		'max',
	),
)); 


$this->endWidget(); 
?>
