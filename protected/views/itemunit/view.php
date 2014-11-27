<?php
$this->breadcrumbs=array(
	'Itemunits'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." " .Yii::t('models',"Item Units"), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." " .Yii::t('models',"Item Units"), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Update')." " .Yii::t('models',"Item Units"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('actions','Delete')." " .Yii::t('models',"Item Units"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('actions','Manage')." " .Yii::t('models',"Item Units"), 'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',Yii::t('actions','View')." " .Yii::t('models',"Item Units"))." ". $model->id,
    //'width' => '800',
)); 
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'precision',
	),
)); ?>
<?php  $this->endWidget(); ?>