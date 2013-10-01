<?php
$this->breadcrumbs=array(
	'Itemcategories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Item Category', 'url'=>array('index')),
	array('label'=>'Create Item Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('itemcategory-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Manage Item Categories"),
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
