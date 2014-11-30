<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Id6111')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account Id6111'),'url'=>array('index')),
	array('label'=>Yii::t('app','Manage Account Id6111'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Create Account Id6111"),

)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 


 $this->endWidget(); 
?>