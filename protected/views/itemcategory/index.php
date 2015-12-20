<?php
$this->params["breadcrumbs"]=array(
	'Item Categories',
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','Create Item Category'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Manage Item Categories'), 'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Item Categories"),
)); 
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));

 app\widgets\MiniForm::end(); 
?>
