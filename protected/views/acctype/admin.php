<?php
$this->breadcrumbs=array(
	'Acctypes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Acctype','url'=>array('index')),
	array('label'=>'Create Acctype','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('acctype-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

 $this->beginWidget('MiniForm',array(
    'haeder' => "Manage Account types",
    //'width' => '800',
)); 


?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'acctype-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'desc',
		'openformat',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 


?>
