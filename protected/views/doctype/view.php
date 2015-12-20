<?php
$this->params["breadcrumbs"]=array(
	'Doctypes'=>array('index'),
	$model->name,
);

$this->params["menu"]=array(
	//array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>Yii::t("app",'Create Document Type'), 'url'=>array('create')),
	array('label'=>Yii::t("app",'Update Document Type'), 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>Yii::t("app",'Delete Document Type'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t("app","Manage Document Type"), 'url'=>array('admin')),
);

 app\widgets\MiniForm::begin(array('header' => Yii::t("app","View Document Type")." ".$model->id,)); 
?>

<?= kartik\detail\DetailView::widget( array(
	'model'=>$model,
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

 app\widgets\MiniForm::end(); 
?>