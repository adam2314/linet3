<?php

$this->params["menu"]=array(
	//array('label'=>Yii::t('app','List Account Contact History'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Contact History'),'url'=>array('create')),
	//array('label'=>Yii::t('app','View Account Contact History'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Account Contact History'),'url'=>array('admin')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Update Account Contact History") ." ". $model->id,
    //'width' => '800',
)); 

?>
<?php echo $this->render('_form',array('model'=>$model)); 

 app\widgets\MiniForm::end(); 
?>