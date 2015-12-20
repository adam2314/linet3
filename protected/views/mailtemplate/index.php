<?php
$this->params["menu"]=array(
	array('label'=>Yii::t('app','Create Mail Template'),'url'=>array('create')),
	array('label'=>Yii::t('app','Manage Mail Template'),'url'=>array('admin')),
);


 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Mail Template"),
    //'width' => '800',
)); 

?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));

 app\widgets\MiniForm::end();

?>
