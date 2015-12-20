<?php
$this->params["breadcrumbs"]=array(
	'Menu'=>array('index'),
	$model->label,
);

$this->params["menu"]=array(
	array('label'=>'List Menu','url'=>array('index')),
	array('label'=>'Create Menu','url'=>array('create')),
	array('label'=>'Update Menu','url'=>array('update','id'=>$model->id)),
	//array('label'=>'Delete Menu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Menu','url'=>array('admin')),
);
?>
<?php  app\widgets\MiniForm::begin(array( 'header' => Yii::t("app","View Menu")." ". $model->id,));  ?>


<?= kartik\detail\DetailView::widget(array(
	'model'=>$model,
	'attributes'=>array(
		'id',
		'label',
		'url',
                'icon',
		'parent',
	),
)); ?>


<?php app\widgets\MiniForm::end();?>