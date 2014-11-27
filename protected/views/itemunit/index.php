<?php
$this->breadcrumbs=array(
	'Itemunits',
);

$this->menu=array(
	array('label'=>Yii::t('actions','Create')." " .Yii::t('models',"Item Units"), 'url'=>array('create')),
	array('label'=>Yii::t('actions','Manage')." " .Yii::t('models',"Item Units"), 'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('models',"Item Units"),
    //'width' => '800',
)); 

?>

<h1>Itemunits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<?php  $this->endWidget(); ?>
