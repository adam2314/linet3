<?php
$this->breadcrumbs=array(
	'Itemunits'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Itemunit', 'url'=>array('index')),
	array('label'=>'Create Itemunit', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('itemunit-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

 $this->beginWidget('MiniForm',array(
    'haeder' => "Manage Item Units",
    //'width' => '800',
)); 

?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'itemunit-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		'precision',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 


?>
