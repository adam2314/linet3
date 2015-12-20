<?php 
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
\yii\widgets\Pjax::begin();
echo app\widgets\GridView::widget( array(
	'id'=>'accounts'.$model->type.'-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
        
	'columns'=>array(
		'id',
		array(
	            'name' => 'name',
	            'type' => 'raw',
	            'value' => '\yii\helpers\Html::link(\yii\helpers\Html::encode($data->name), yii\helpers\BaseUrl::base().("accounts/update", array("id"=>$data->id)))',
	        ),
		'cat_id',
		'id6111',
            array(
	            'name' => 'cat_id',
	            'type' => 'raw',
	            'value' => '\yii\helpers\Html::encode(isset($data->Category)?$data->Category->name: "")',
                    'filter' => \yii\helpers\ArrayHelper::map(AccCat::findAllByAttributes(array("type_id"=>$model->type)), 'id', 'name'),
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
		[
			'class'=>'yii\grid\ActionColumn',
			'template'=>'{create}{display}{update}{delete}',
			'buttons'=>array(
                            'create' => array(
                                'label'=>'<i class="glyphicon glyphicon-file"></i>',
                                'url'=>'yii\helpers\BaseUrl::base().("docs/create", array("id"=>$data->id))',

                            ),
                            'update' => array(
                                'label'=>'<i class="glyphicon glyphicon-pencil"></i>',
                                'url'=>'yii\helpers\BaseUrl::base().("accounts/update", array("id"=>$data->id))',

                            ),
                            'delete' => array(
                                'label'=>'<i class="glyphicon glyphicon-trash"></i>',
                                //'deleteConfirmation'=>true,
                                'imageUrl'=>false,
                                'url'=>'yii\helpers\BaseUrl::base().("accounts/delete", array("id"=>$data->id))',
                                //'url'=>'yii\helpers\BaseUrl::base().("users/email", array("id"=>$data->id))',
                            ),
                            'display' => array(
                                'label'=>'<i class="glyphicon glyphicon-transfer"></i>',
                                'url'=>'yii\helpers\BaseUrl::base().("accounts/transaction/".$data->id)',
                                //'visible'=>'$data->score > 0',
                                //'click'=>'function(){alert("Going down!");}',
                            ),
		    ),
		],
	),
)); 
\yii\widgets\Pjax::end();
?>


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
	jQuery('#accounts<?php echo $model->type;?>-grid').yiiGridView('update', {
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