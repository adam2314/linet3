<?php
$this->breadcrumbs=array(
	'Itemcategories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." " .Yii::t('models','Item Categories'), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." " .Yii::t('models','Item Categories'), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." " .Yii::t('models','Item Categories'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('actions','Delete')." " .Yii::t('models','Item Categories'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('actions','Admin')." " .Yii::t('models','Item Categories'), 'url'=>array('admin')),
);
$this->beginWidget('MiniForm',array(
    'header' => Yii::t('actions',"View") . " ".Yii::t('models',"Item Categories")." ". $model->id,
)); 
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'profit',
	),
)); ?>


<?php

 $this->endWidget(); 

?>