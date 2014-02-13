<?php
//$this->breadcrumbs=array(
//	'Doctypes'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	array('label'=>Yii::t('app',"Create Doctype"), 'url'=>array('create')),
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
    'haeder' => Yii::t('app',"Manage Documenet types"),
    //'width' => '800',
)); 



?>

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
