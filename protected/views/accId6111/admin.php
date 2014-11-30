<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Id6111')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	//array('label'=>'List Id6111','url'=>array('index')),
	array('label'=>Yii::t('app','Create Id6111'),'url'=>array('create')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Manage Account Id6111"),

)); 


?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bank-name-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 


 $this->endWidget(); 
?>
