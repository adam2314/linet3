<?php 
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accounts-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		//'prefix',
		//'company',
		array(
	            'name' => 'company',
	            'type' => 'raw',
	            'value' => 'CHtml::link(CHtml::encode($data->company), "index.php?r=accounts/update&id=".CHtml::encode($data->id))',
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
			'template'=>'{update}{delete}{view}',
			'buttons'=>array
		    (
		        'update' => array
		        (
		            'label'=>'edit',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
		            'url'=>'Yii::app()->createUrl("accounts/update", array("id"=>$data->id))',
		        	
		        ),
		        'delete' => array
		        (
		            'label'=>'delete',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
		        	'url'=>'Yii::app()->createUrl("accounts/delete", array("id"=>$data->id))',
		            //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
		        ),
		        'view' => array
		        (
		            'label'=>'transactions',
		            'url'=>'Yii::app()->createUrl("accounts/transaction", array("id"=>$data->id))',
		            //'visible'=>'$data->score > 0',
		            'click'=>'function(){alert("Going down!");}',
		        ),
		    ),
		),
	),
)); ?>
