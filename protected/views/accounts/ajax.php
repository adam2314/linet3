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
                                //'deleteConfirmation'=>true,
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


<script type="text/javascript">




jQuery('#accounts-grid0').yiiGridView({
    'ajaxUpdate':['1','accounts-grid0'],
    'ajaxVar':'ajax',
    'pagerClass':'pagination',
    'loadingClass':'grid-view-loading',
    'filterClass':'filters',
    'tableClass':'accounts table',
    'selectableRows':1,
    'enableHistory':false,
    'updateSelector':'{page}, {sort}',
    'filterSelector':'{filter}',
    'ajaxType':'POST',
    'pageVar':'Accounts_page'
    });
    
    
    /*

    

jQuery(document).on('click','#accounts-grid0 a.delete',function() {
	if(!confirm('Are you sure you want to delete this item?')) return false;
	var th = this,
		afterDelete = function(){};
	jQuery('#accounts-grid0').yiiGridView('update', {
		type: 'POST',
		url: jQuery(this).attr('href'),
		success: function(data) {
			jQuery('#accounts-grid0').yiiGridView('update');
			afterDelete(th, true, data);
		},
		error: function(XHR) {
			return afterDelete(th, false, XHR);
		}
	});
	return false;
});*/








</script>