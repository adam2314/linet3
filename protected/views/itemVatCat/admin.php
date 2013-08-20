<?php
$this->breadcrumbs=array(
	'Item Vat Cats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>'Create ItemVatCat','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('item-vat-cat-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Manage Item Tax Catagorys"),)); 
?>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'item-vat-cat-grid',
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
