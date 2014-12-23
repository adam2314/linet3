<?php
$this->breadcrumbs=array(
	Yii::t('models','Payments Types')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('actions','Update'),
);

$this->menu=array(
	//array('label'=>Yii::t('actions','List')." ". Yii::t('models','Payments Types'), 'url'=>array('index')),
	//array('label'=>Yii::t('actions','Create')." ". Yii::t('models','Payments Types'), 'url'=>array('create')),
	//array('label'=>Yii::t('actions','View')." ". Yii::t('models','Payments Types'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('actions','Manage')." ". Yii::t('models','Payments Types'), 'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('actions','Update')." ". Yii::t('models','Payments Types').": ". Yii::t('app',$model->name),
)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget(); 

?>