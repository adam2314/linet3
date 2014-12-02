<?php
$this->breadcrumbs=array(
	'Eav Fields'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','Create EavFields'),'url'=>array('create')),
);

 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Manage Eav Fields"),
)); 
?>

<?php $this->widget('EExcelView',array(
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
