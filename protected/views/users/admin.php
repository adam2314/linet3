<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('app','List User'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create User'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('MiniForm',array('haeder' => Yii::t('app',"Manage Users"),)); 

?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'username',
		'fname',
                'lname',
		//'password',
		'lastlogin',
                'email',
		//'cookie',
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

$this->endWidget(); 
?>
