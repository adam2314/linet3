<?php
$this->params["breadcrumbs"]=array(
	'Itemunits',
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','Create')." " .Yii::t('app',"Item Units"), 'url'=>array('create')),
	array('label'=>Yii::t('app','Manage')." " .Yii::t('app',"Item Units"), 'url'=>array('admin')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Item Units"),
    //'width' => '800',
)); 

?>

<h1>Itemunits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<?php  app\widgets\MiniForm::end(); ?>
