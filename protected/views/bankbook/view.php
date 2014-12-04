<?php
$this->breadcrumbs=array(
	Yii::t('app','Bankbooks')=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>Yii::t('app','List Bankbooks'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Bankbooks'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Update Bankbooks'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Delete Bankbooks'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Manage Bankbooks'), 'url'=>array('admin')),
);
?>

<?php 
 $this->beginWidget('MiniForm',array(
    'header' => "View Bankbooks",
   // 'width' => '800',
)); 
 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'currency_id',
		'date',
		'sum',
	),
)); 
  $this->endWidget(); 
 
 
 ?>
