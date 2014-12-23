<?php
$this->breadcrumbs=array(
	'Acctypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	//array('label'=>Yii::t('app',"List Mail Template"),'url'=>array('index')),
	array('label'=>Yii::t('app',"Create Mail Template"),'url'=>array('create')),
	array('label'=>Yii::t('app',"Update Mail Template"),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app',"Delete Mail Template"),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app',"Manage Mail Template"),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"View Mail Template")." ".$model->name,

)); 

?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
                'subject',
		'cc',
		'bcc',
	),
)); ?>
<?php $this->endWidget(); ?>