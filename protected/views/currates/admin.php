<?php
$this->breadcrumbs=array(
	'Currates'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>'Create Currates', 'url'=>array('create')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array('haeder' => "Manage Currates",)); 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('currates-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Currates</h1>

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
<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'currates-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		
                array(
                    'name' => 'currency_id',
                     'value' => 'isset($data->Currency)?$data->Currency->name:0',   //where name is Client model attribute 
                   ),
		'date',
		'value',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 


 $this->endWidget(); 

?>
