<?php
$this->params["breadcrumbs"]=array(
	//Yii::t('app','Item Categories')=>array('index'),
	//$model->name=>array('view','id'=>$model->id),
	//Yii::t('app','Update'),
);

$this->params["menu"]=array(
	//array('label'=>Yii::t('app','List Item Categories'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Item Category'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View Item Categories'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Item Categories'), 'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Update Item Categories")." ". $model->id,
)); 
?>


<?php echo $this->render('_form', array('model'=>$model)); 

 app\widgets\MiniForm::end(); 

?>