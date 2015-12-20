<?php
$this->params["breadcrumbs"]=array(
	Yii::t('app','Account Id6111')=>array('index'),
	$model->name,
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List Account Id6111'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Id6111'),'url'=>array('create')),
	array('label'=>Yii::t('app','Update Account Id6111'),'url'=>array('update','id'=>$model->id)),
	//array('label'=>Yii::t('app','Delete Account Id6111'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Manage Account Id6111'),'url'=>array('admin')),
);


app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"View Account Id6111")." " .$model->id,

)); 

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
