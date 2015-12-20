<?php
$this->params["breadcrumbs"]=array(
	//'Itemunits'=>array('index'),
	//$model->name,
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List')." " .Yii::t('app',"Item Units"), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create')." " .Yii::t('app',"Item Units"), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update')." " .Yii::t('app',"Item Units"), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Delete')." " .Yii::t('app',"Item Units"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Manage')." " .Yii::t('app',"Item Units"), 'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',Yii::t('app','View')." " .Yii::t('app',"Item Units"))." ". $model->id,
    //'width' => '800',
)); 
?>

<?= kartik\detail\DetailView::widget( array(
	'model'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'precision',
	),
)); ?>
<?php  app\widgets\MiniForm::end(); ?>