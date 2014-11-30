<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Categories')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account Categories'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Category'),'url'=>array('create')),
	array('label'=>Yii::t('app','View Account Category'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Account Categories'),'url'=>array('admin')),
);
        
        $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Update Account Category")." ".$model->id,

)); 
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); 
 $this->endWidget(); 
 ?>