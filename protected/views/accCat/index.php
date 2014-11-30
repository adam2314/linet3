<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Categories'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Account Category'),'url'=>array('create')),
	array('label'=>Yii::t('app','Manage Account Categories'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Account Categories"),

)); 
?>


<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

 $this->endWidget(); 
?>
