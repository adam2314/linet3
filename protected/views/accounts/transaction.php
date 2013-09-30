<?php 
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>

<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => "Transactions for Account $model->id",
    'width' => '800',
)); 
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'transactions-grid',
	'dataProvider'=>$model->search(),
        //'enablePagination'=> false,
	//'filter'=>$model,
	'columns'=>array(
		'num',
		//'prefix',
		//'company',
		/*array(
	            'name' => 'company',
	            'type' => 'raw',
	            'value' => 'CHtml::link(CHtml::encode($data->company), "index.php?r=accounts/update&id=".CHtml::encode($data->num))',
	        ),*/
		'type',
		'refnum1',
                'refnum2',
		'date',
		'sum',
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
		/*array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}{view}',
			'buttons'=>array
		    (
		        'update' => array
		        (
		            'label'=>'edit',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
		            //'url'=>'Yii::app()->createUrl("accounts/update", array("id"=>$data->num))',
		        	
		        ),
		        'delete' => array
		        (
		            'label'=>'delete',
		            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
		        	//'url'=>'Yii::app()->createUrl("accounts/delete", array("id"=>$data->num))',
		            //'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
		        ),
		        'view' => array
		        (
		            'label'=>'transactions',
		           // 'url'=>'Yii::app()->createUrl("accounts/transaction", array("id"=>$data->num))',
		            //'visible'=>'$data->score > 0',
		            'click'=>'function(){alert("Going down!");}',
		        ),
		    ),
		),//*/
	),
)); 
 $this->endWidget(); 
 ?>