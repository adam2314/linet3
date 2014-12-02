<?php

//$this->breadcrumbs=array(
//	'Doctypes'=>array('index'),
//	'Manage',
//);

$this->menu = array(
    array('label' => Yii::t('app', "Create Document Type"), 'url' => array('create')),
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
$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "Manage Document types"),
));
?>

<?php

$this->widget('EExcelView', array(
    'id' => 'doctype-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'name',
            'value' => 'Yii::t("app",$data->name)'
        ),

        array(
            'name' => 'docStatus_id',
            'value' => '$data->docStatus->name'
        ),
        'last_docnum',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
$this->endWidget();
?>
