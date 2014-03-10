<?php 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('accounts-grid', {
		data: $(this).serialize()
	});
	return false;
});
");




$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'accounts-grid'.$model->type,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'template' => '{items}{pager}',
        'ajaxUpdate'=>true,
        'ajaxType'=>'POST',
	'columns'=>array(
		'id',
		array(
	            'name' => 'name',
	            'type' => 'raw',
	            'value' => 'CHtml::link(CHtml::encode($data->name), Yii::app()->createUrl("accounts/update", array("id"=>$data->id)))',
	        ),
		//'type',
		'id6111',
		'pay_terms',
		'src_tax',
		/*
		'src_date',
		'grp',
		'company',
		'contact',
		'department',
		'vatnum',
		'email',
		'phone',
		'dir_phone',
		'cellular',
		'fax',
		'web',
		'address',
		'city',
		'zip',
		'comments',
		'owner',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{display}{edit}{delete}',
			'buttons'=>array(
                            'edit' => array(
                                'label'=>'<i class="glyphicon glyphicon-pencil"></i>',
                                'url'=>'Yii::app()->createUrl("accounts/update", array("id"=>$data->id))',

                            ),
                            'delete' => array(
                                'label'=>'<i class="glyphicon glyphicon-trash"></i>',
                                'deleteConfirmation'=>true,
                                'imageUrl'=>false,
                                'url'=>'Yii::app()->createUrl("accounts/delete", array("id"=>$data->id))',
                                //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
                            ),
                            'display' => array(
                                'label'=>'<i class="glyphicon glyphicon-transfer"></i>',
                                'url'=>'Yii::app()->createUrl("accounts/transaction", array("id"=>$data->id))',
                                //'visible'=>'$data->score > 0',
                                'click'=>'function(){alert("Going down!");}',
                            ),
		    ),
		),
	),
)); ?>
