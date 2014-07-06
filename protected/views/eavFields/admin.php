<?php
$this->breadcrumbs=array(
	'Eav Fields'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List EavFields','url'=>array('index')),
	array('label'=>Yii::t('app','Create EavFields'),'url'=>array('create')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Manage Eav Fields"),
    //'width' => '800',
)); 
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'eav-fields-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'eavType',
		'min',
		'max',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 


 $this->endWidget(); 

?>
