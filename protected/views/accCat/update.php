<?php
$this->breadcrumbs=array(
	Yii::t('app','Account Catagories')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','List Account Catagories'),'url'=>array('index')),
	array('label'=>Yii::t('app','Create Account Catagory'),'url'=>array('create')),
	array('label'=>Yii::t('app','View Account Catagory'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','Manage Account Catagories'),'url'=>array('admin')),
);
        
        $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Update Account Catagory")." ".$model->id,

)); 
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); 
 $this->endWidget(); 
 ?>