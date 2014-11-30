<?php
$this->breadcrumbs=array(
	'Itemunits'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." " .Yii::t('models',"Item Units"), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Create')." " .Yii::t('models',"Item Units"), 'url'=>array('create')),
	array('label'=>Yii::t('actions','View')." " .Yii::t('models',"Item Units"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('actions','Manage')." " .Yii::t('models',"Item Units"), 'url'=>array('admin')),
);
$this->beginWidget('MiniForm',array(
    'header' => Yii::t('actions','Update')." " .Yii::t('models',"Item Units")." ". $model->id,
    //'width' => '800',
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php  $this->endWidget(); ?>