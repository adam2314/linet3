<?php

$this->menu=array(
	//array('label'=>'List EavFields','url'=>array('index')),
	array('label'=>'Create EavFields','url'=>array('create')),
	array('label'=>'Update EavFields','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete EavFields','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EavFields','url'=>array('admin')),
);


$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"View Eav Field #"). $model->id,
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
