<?php
$this->breadcrumbs=array(
	'Menu'=>array('index'),
	$model->label,
);

$this->menu=array(
	array('label'=>'List Menu','url'=>array('index')),
	array('label'=>'Create Menu','url'=>array('create')),
	array('label'=>'Update Menu','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Menu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Menu','url'=>array('admin')),
);
?>
<?php  $this->beginWidget('MiniForm',array( 'header' => Yii::t("app","View Menu")." ". $model->id,));  ?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'label',
		'url',
                'icon',
		'parent',
	),
)); ?>


<?php $this->endWidget();?>