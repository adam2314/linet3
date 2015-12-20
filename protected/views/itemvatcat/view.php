<?php
$this->params["breadcrumbs"]=array(
	Yii::t("app",'Item Vat Categories')=>array('index'),
	$model->name,
);

$this->params["menu"]=array(
	//array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>Yii::t("app",'Create Item Tax Category'),'url'=>array('create')),
	array('label'=>Yii::t("app",'Update Item Tax Category'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t("app",'Delete Item Tax Category'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t("app",'Manage Item Tax Categories'),'url'=>array('admin')),
);
app\widgets\MiniForm::begin(array('header' => Yii::t("app","View Item Tax Category #")." ".$model->id,)); 
?>



<?= kartik\detail\DetailView::widget(array(
	'model'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); 
app\widgets\MiniForm::end(); 
?>
