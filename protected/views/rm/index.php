<?php
$this->params["menu"]=array(
	array('label'=>Yii::t("app",'Create Account Contact History'),'url'=>array('create')),
	array('label'=>Yii::t("app",'Manage Accounts Contact History'),'url'=>array('admin')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t("app","Account Contact History"),
)); 

?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 


 app\widgets\MiniForm::end(); 

?>
