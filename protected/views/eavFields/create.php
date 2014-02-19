<?php

$this->menu=array(
	
	array('label'=>Yii::t('app','Manage EavFields'),'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Create Eav Fields"),
    //'width' => '800',
)); 
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); 


$this->endWidget(); 
?>