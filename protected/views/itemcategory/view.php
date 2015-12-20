<?php
$this->params["breadcrumbs"]=array(
	//'Itemcategories'=>array('index'),
	//$model->name,
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List')." " .Yii::t('app','Item Categories'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create')." " .Yii::t('app','Item Categories'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update')." " .Yii::t('app','Item Categories'), 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>Yii::t('app','Delete')." " .Yii::t('app','Item Categories'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Admin')." " .Yii::t('app','Item Categories'), 'url'=>array('admin')),
);
app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"View") . " ".Yii::t('app',"Item Categories")." ". $model->id,
)); 
?>


<?= kartik\detail\DetailView::widget( array(
	'model'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'profit',
	),
)); ?>


<?php

 app\widgets\MiniForm::end(); 

?>