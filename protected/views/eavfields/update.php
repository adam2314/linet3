<?php
$this->params["breadcrumbs"]=array(
	'Eav Fields'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->params["menu"]=array(
	//array('label'=>'List EavFields','url'=>array('index')),
	array('label'=>Yii::t('app','Create EavFields'),'url'=>array('create')),
	//array('label'=>Yii::t('app','View EavFields'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage EavFields'),'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Update Eav Fields")." ".$model->id,
)); 

?>


<?php echo $this->render('_form',array('model'=>$model)); ?>

<?php app\widgets\MiniForm::end(); ?>