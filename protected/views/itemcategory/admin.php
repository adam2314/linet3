<?php
$this->breadcrumbs=array(
	Yii::t('app','Item Categories')=>array('index'),
	Yii::t('app','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List Item Category'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Item Category'), 'url'=>array('create')),
);


$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Manage Item Categories"),
)); 


?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'itemcategory-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'profit',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 

?>
