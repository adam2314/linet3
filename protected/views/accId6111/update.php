<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Id6111')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account Id6111'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Id6111'),'url'=>array('create')),
	array('label'=>Yii::t('app','View Account Id6111'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Account Id6111'),'url'=>array('admin')),
);
        
        $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Update Account Id6111")." ".$model->id,

)); 
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); 
 $this->endWidget(); 
 ?>