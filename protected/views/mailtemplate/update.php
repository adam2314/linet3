<?php

$this->params["menu"]=array(
	//array('label'=>Yii::t('app',"List Mail Template"),'url'=>array('index')),
	array('label'=>Yii::t('app',"Create Mail Template"),'url'=>array('create')),
	array('label'=>Yii::t('app',"View Mail Template"),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app',"Manage Mail Template"),'url'=>array('admin')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Update Mail Template") ." ". $model->name,
    //'width' => '800',
)); 

?>
<?php echo $this->render('_form',array('model'=>$model)); 

 app\widgets\MiniForm::end(); 
?>