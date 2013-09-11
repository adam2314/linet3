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


$form=$this->beginWidget('CActiveForm', array(
    'id'=>'page-form',
    'enableAjaxValidation'=>true,
)); 

echo Yii::t('app','From Date');
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'date_from',  // name of post parameter
    'value'=>$model->issue_from,//Yii::app()->request->cookies['date.from']->value,  // value comes from cookie after submittion
    //'value'=>date("d/m/Y"),
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));


echo Yii::t('app','To Date');

$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'date_to',
    //'value'=>$model->issue_to,//Yii::app()->request->cookies['date.to']->value,
    'value'=>date("d/m/Y"),
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
 
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
echo CHtml::submitButton('Go'); 
 $this->endWidget(); 





echo $this->renderPartial('_list', array('model' => $model));

 $this->endWidget();
?>
