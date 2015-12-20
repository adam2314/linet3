<?php


$this->params["menu"]=array(
	
);
?>



<?php 
app\widgets\MiniForm::begin(array('header' => Yii::t("app","Create"))); 
echo $this->render('_form', array('model'=>$model)); 
app\widgets\MiniForm::end(); 
?>