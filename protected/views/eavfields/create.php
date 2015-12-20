<?php

$this->params["menu"]=array(
	
	array('label'=>Yii::t('app','Manage EavFields'),'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Create Eav Fields"),
    //'width' => '800',
)); 
?>


<?php echo $this->render('_form', array('model'=>$model)); 


app\widgets\MiniForm::end(); 
?>