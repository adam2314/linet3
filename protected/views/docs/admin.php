<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	array('label'=>'List Docs', 'url'=>array('index')),
	array('label'=>'Create Docs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('docs-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('MiniForm',array(
    'haeder' => "Manage Docs",  )); 

//print_r(Yii::app()->getLocale());
echo Yii::app()->locale->getDateFormat('short');

echo $this->renderPartial('_list', array('model' => $model));

 $this->endWidget();
?>
