<?php
$this->params["breadcrumbs"]=array(
	Yii::t('app','Payments Types')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Update'),
);

$this->params["menu"]=array(
	//array('label'=>Yii::t('app','List')." ". Yii::t('app','Payments Types'), 'url'=>array('index')),
	//array('label'=>Yii::t('app','Create')." ". Yii::t('app','Payments Types'), 'url'=>array('create')),
	//array('label'=>Yii::t('app','View')." ". Yii::t('app','Payments Types'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage')." ". Yii::t('app','Payments Types'), 'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app','Update')." ". Yii::t('app','Payments Types').": ". Yii::t('app',$model->name),
)); 
?>


<?php echo $this->render('_form', array('model'=>$model)); 

 app\widgets\MiniForm::end(); 

?>