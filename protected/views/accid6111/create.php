<?php
$this->params["breadcrumbs"]=array(
	Yii::t('app','Account Id6111')=>array('index'),
	Yii::t('app','Create'),
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List Account Id6111'),'url'=>array('index')),
	array('label'=>Yii::t('app','Manage Account Id6111'),'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Create Account Id6111"),

)); 
?>

<?php echo $this->render('_form', array('model'=>$model)); 


 app\widgets\MiniForm::end(); 
?>