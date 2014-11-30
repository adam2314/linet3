<?php
$this->breadcrumbs=array(
	'Item Categories',
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Item Category'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Manage Item Categories'), 'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Item Categories"),
)); 
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));

 $this->endWidget(); 
?>
