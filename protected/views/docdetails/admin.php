<?php
$this->breadcrumbs=array(
	'Docdetails'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Docdetails', 'url'=>array('index')),
	array('label'=>'Create Docdetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('docdetails-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Docdetails</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'docdetails-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'doc_id',
		'item_id',
		'name',
		'description',
		'qty',
		/*
		'unit_price',
		'currency',
		'price',
		'nisprice',
		'line',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
