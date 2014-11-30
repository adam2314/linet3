<?php
$this->breadcrumbs=array(
	'Itemunits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('actions','List')." " .Yii::t('models',"Item Units"), 'url'=>array('index')),
	array('label'=>Yii::t('actions','Manage')." " .Yii::t('models',"Item Units"), 'url'=>array('admin')),
);


$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',Yii::t('actions','Create')." " .Yii::t('models',"Item Units")),
    //'width' => '800',
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php  $this->endWidget(); ?>
