<?php
$this->breadcrumbs=array(
	Yii::t('app','Item Categories')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List Item Categories'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Item Category'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Item Categories'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Item Categories'), 'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Update Item Categories")." ". $model->id,
)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget(); 

?>