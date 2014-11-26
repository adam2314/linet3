<?php
$this->breadcrumbs=array(
	'Doctypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	//array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>Yii::t("app",'Create Document Type'), 'url'=>array('create')),
	array('label'=>Yii::t("app",'Update Document Type'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t("app",'Delete Document Type'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t("app","Manage Document Type"), 'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array('haeder' => Yii::t("app","View Document Type")." ".$model->id,)); 
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'openformat',
		'isdoc',
		'isrecipet',
		'iscontract',
		'stockAction',
		'account_type',
		'docStatus_id',
		'last_docnum',
	),
)); ?>
<?php 

 $this->endWidget(); 
?>