<?php
$this->params["breadcrumbs"]=array(
	Yii::t("app",'Item Vat Catagories')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t("app",'Update'),
);

$this->params["menu"]=array(
	//array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>Yii::t("app",'Create Item Tax Category'),'url'=>array('create')),
	//array('label'=>Yii::t("app",'View Item Tax Category'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t("app",'Manage Item Tax Categories'),'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array('header' => Yii::t("app","Update Item Tax Category #"). "".$model->id,)); 
?>


<?php echo $this->render('_form',array('model'=>$model)); 

app\widgets\MiniForm::end(); 
?>