<?php
$this->breadcrumbs=array(
	Yii::t('app','Bankbooks')=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('app','List Bankbooks'),'url'=>array('index')),
	array('label'=>Yii::t('app','Manage Bankbooks'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Create Bankbooks"),
)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>