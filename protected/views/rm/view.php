<?php
$this->breadcrumbs=array(
	Yii::t('app','Account History')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account History'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account History'),'url'=>array('create')),
	array('label'=>Yii::t('app','Update Account History'),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','Delete Account History'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app','Manage Account History'),'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"View Account History")." ". $model->id,
    //'width' => '800',
)); 

?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dt',
                array(
                    'name'=>'details',
                    'value'=>$model->details,
                     'type'=>'raw',
                         
                ),
		
		//'openformat',
	),
)); 

 $this->endWidget(); 
?>
