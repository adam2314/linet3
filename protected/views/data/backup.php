<?php

$this->menu = array(
    array('label' => Yii::t('app', 'Create Backup'), 'url' => array('backup','Backup'=>'True')),
    //array('label' => Yii::t('app', 'Create Account types'), 'url' => array('create')),
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
		//'path',
		//'openformat',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{restore}{download}{delete}',
			'buttons'=>array(
                            'restore' => array(
                                'label'=>'Restore<i class="glyphicon glyphicon-restore"></i>',
                                'url'=>'Yii::app()->createUrl("data/restore/". $data->id)',

                            ),
                            'download' => array(
                                'label'=>'<i class="glyphicon glyphicon-download"></i>',
                                'url'=>'Yii::app()->createUrl("download/".$data->id)',

                            ),
                            'delete' => array(
                                'label'=>'<i class="glyphicon glyphicon-trash"></i>',
                                //'deleteConfirmation'=>true,
                                'imageUrl'=>false,
                                'url'=>'Yii::app()->createUrl("files/delete", array("id"=>$data->id))',
                                //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
                            ),
                            
		    ),
		),
	),
)); 

 $this->endWidget(); 


?>
