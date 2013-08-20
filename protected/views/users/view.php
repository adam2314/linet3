<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'Update User','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User','url'=>array('admin')),
);

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","View User ") ." " .$model->fullname,));
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'fullname',
		'password',
		'lastlogin',
		'cookie',
		'hash',
		'certpasswd',
		'salt',
		'email',
	),
)); 


$this->endWidget(); 
?>
