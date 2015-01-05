<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('log-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Manage Logs"),

)); 


?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tenant-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'level',
		'category',
                //'category',
		'IP_User',
            'user_id',
            'request_URL',
            'message',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 

?>
