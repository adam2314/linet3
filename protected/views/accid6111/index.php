<?php
$this->params["breadcrumbs"]=array(
	Yii::t('app','Account Id6111'),
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','Create Account Id6111'),'url'=>array('create')),
	array('label'=>Yii::t('app','Manage Account Id6111'),'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Account Id6111"),

)); 
?>


<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

 app\widgets\MiniForm::end(); 
?>
