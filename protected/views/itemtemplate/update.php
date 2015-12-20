<?php
$this->params["menu"]=array(
	array('label'=>Yii::t('app','List Account Template'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Template'),'url'=>array('create')),
	array('label'=>Yii::t('app','View Account Template'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Account Template'),'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Update Account Template")." ".$model->name,
)); 

?>



<?php echo $this->render('_form',array('model'=>$model,'items'=>$items)); 
 app\widgets\MiniForm::end(); 

?>