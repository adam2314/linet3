<?php

$this->menu=array(
	array('label'=>Yii::t('app',"List Company"),'url'=>array('index')),
);


 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Create Company"),
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget();

?>