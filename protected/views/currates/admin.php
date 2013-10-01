<?php
$this->breadcrumbs=array(
	'Currates'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Currency Rate'), 'url'=>array('create')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array('haeder' => Yii::t('app',"Manage Currencies Rates"),)); 
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
