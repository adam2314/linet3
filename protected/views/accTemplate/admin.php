<?php

$this->menu = array(
    array('label' => Yii::t('app', 'Create Account Template'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('acc-template-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "Manage Account Templates"),
));
?>

<?php

$this->widget('EExcelView', array(
    'id' => 'acc-template-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'template' => '{items}{pager}',
    'ajaxUpdate' => true,
    'columns' => array(
        //'id',
        'name',
        //'AccType_id',
        array(
            'name' => 'AccType_id',
            'value' => 'Yii::t("app",$data->type->desc)',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));

$this->endWidget();
?>
