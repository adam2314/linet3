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
	'id'=>'accounts'.$model->type.'-grid',
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
            array(
	            'name' => 'cat_id',
	            'type' => 'raw',
	            'value' => 'CHtml::encode(isset($data->Category)?$data->Category->name: "")',
                    'filter' => CHtml::listData(AccCat::model()->findAllByAttributes(array("type_id"=>$model->type)), 'id', 'name'),
	        ),
		//'pay_terms',
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
			'template'=>'{create}{display}{edit}{delete}',
			'buttons'=>array(
                            'create' => array(
                                'label'=>'<i class="glyphicon glyphicon-file"></i>',
                                'url'=>'Yii::app()->createUrl("docs/create", array("id"=>$data->id))',

                            ),
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
                                //'click'=>'function(){alert("Going down!");}',
                            ),
		    ),
		),
	),
)); ?>


<script type="text/javascript">




jQuery('#accounts<?php echo $model->type;?>-grid').yiiGridView({
    'ajaxUpdate':['1','accounts<?php echo $model->type;?>-grid'],
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
    //*/
    
    

    

jQuery(document).on('click','#accounts<?php echo $model->type;?>-grid a.delete',function() {
	if(!confirm('Are you sure you want to delete this item?'))
           return false;
       
	var th = this,afterDelete = function(){};
	jQuery('#accounts0-grid').yiiGridView('update', {
		type: 'POST',
		url: jQuery(this).attr('href'),
		success: function(data) {
			jQuery('#accounts<?php echo $model->type;?>-grid').yiiGridView('update');
			afterDelete(th, true, data);
                        $('#yw12').prepend(data);
                        
		},
		error: function(XHR) {
			return afterDelete(th, false, XHR);
		}
	});
    
	return false;
});//*/








</script>