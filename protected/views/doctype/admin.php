<?php
//$this->breadcrumbs=array(
//	'Doctypes'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>'Create Doctype', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('doctype-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('MiniForm',array(
    'haeder' => "Manage Doctypes",
    //'width' => '800',
)); 



?>

<h1>Manage Doctypes</h1>

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

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'doctype-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		//'openformat',
		//'isdoc',
		//'isrecipet',
		//'iscontract',
		
		//'stockAction',
		//'account_type',
		'docStatus_id',
		'last_docnum',
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 
 $this->endWidget();
?>
