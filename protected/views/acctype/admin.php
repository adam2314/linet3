<?php

$this->menu = array(
    array('label' => Yii::t('app', 'List Account types'), 'url' => array('index')),
    array('label' => Yii::t('app', 'Create Account types'), 'url' => array('create')),
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
    'header' => Yii::t('app',"Manage Account types"),

)); 


?>

<?php $this->widget('EExcelView',array(
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
