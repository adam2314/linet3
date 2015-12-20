<?php
$this->params["breadcrumbs"]=array(
	Yii::t('app','Account Templates')=>array('index'),
	$model->name=>array('update','id'=>$model->id),
	'Update',
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List Account Templates'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Templates'),'url'=>array('create')),
	array('label'=>Yii::t('app','View Account Templates'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Account Templates'),'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Update Account Template")." ".$model->name,
)); 

?>



<?php echo $this->render('_form',array('model'=>$model,'items'=>$items)); 
 app\widgets\MiniForm::end(); 

?>