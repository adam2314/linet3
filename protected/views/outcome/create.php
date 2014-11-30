<?php


$this->menu=array(
	
);
?>



<?php 
$this->beginWidget('MiniForm',array('header' => Yii::t("app","Create"))); 
echo $this->renderPartial('_form', array('model'=>$model)); 
$this->endWidget(); 
?>