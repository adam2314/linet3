<?php
use app\widgets\app\widgets\MiniForm;
$this->params["menu"]=array(
	//array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Item'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Item'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Item'), 'url'=>array('admin')),
);


app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Update Item"). " ".$model->id,
)); 
?>

<?= $this->render('_form', array(
    'model'=>$model,
    //'units'=>$units,
    //'cat'=>$cat
        )); 

 app\widgets\MiniForm::end();

?>