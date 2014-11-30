<?php
$this->menu=array(
	array('label'=>Yii::t('app','Create Account Template'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('itm-template-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Manage Account Templates"),
)); 
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'itm-template-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		//'AccType_id',
            array(
                'name' => 'Itemcategory_id',
                'value' => '$data->Category->name',
               ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 
?>
