<?php

$this->menu=array(
	array('label'=>Yii::t('app','List Accounts'), 'url'=>array('index')),
	//array('label'=>'Manage Accounts', 'url'=>array('admin')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Create Account") .": ". Yii::t('app',$model->accType->desc),
)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
 $this->endWidget(); 
 
?>