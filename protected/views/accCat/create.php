<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Categories')=>array('index'),
	Yii::t('app','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account Categories'),'url'=>array('index')),
	array('label'=>Yii::t('app','Manage Account Categories'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Create Account Category"),

)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 


 $this->endWidget(); 
?>