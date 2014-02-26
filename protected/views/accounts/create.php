<?php

$this->menu=array(
	array('label'=>Yii::t('app','List Accounts'), 'url'=>array('index')),
	//array('label'=>'Manage Accounts', 'url'=>array('admin')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Create Accounts"),
)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
 $this->endWidget(); 
?>