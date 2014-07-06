<?php
$this->breadcrumbs=array(
	Yii::t("app",'Item Vat Catagories')=>array('index'),
	$model->name,
);

$this->menu=array(
	//array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>Yii::t("app",'Create Item Tax Catagory'),'url'=>array('create')),
	array('label'=>Yii::t("app",'Update Item Tax Catagory'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t("app",'Delete Item Tax Catagory'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t("app",'Manage Item Tax Catagories'),'url'=>array('admin')),
);
$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","View Item Tax Catagory #")." ".$model->id,)); 
?>



<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); 
$this->endWidget(); 
?>
