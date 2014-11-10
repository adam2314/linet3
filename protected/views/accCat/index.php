<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Catagories'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Account Catagory'),'url'=>array('create')),
	array('label'=>Yii::t('app','Manage Account Catagories'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Account Catagories"),

)); 
?>


<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

 $this->endWidget(); 
?>
