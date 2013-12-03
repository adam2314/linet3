<?php
$this->breadcrumbs=array(
	'Itemunits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Itemunit', 'url'=>array('index')),
	array('label'=>'Manage Itemunit', 'url'=>array('admin')),
);


$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Create Item Units"),
    //'width' => '800',
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php  $this->endWidget(); ?>
