<?php

$this->menu=array(
	array('label'=>Yii::t('app','Manage Account Template'),'url'=>array('admin')),
);

 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Create Account Template"),
)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget(); 
?>