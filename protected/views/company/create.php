<?php

$this->params["menu"]=array(
	array('label'=>Yii::t('app',"List Company"),'url'=>array('index')),
);


 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Create Company"),
)); 
?>

<?php echo $this->render('_form', array('model'=>$model)); 

 app\widgets\MiniForm::end();

?>