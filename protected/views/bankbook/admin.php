<?php

$this->params["menu"]=array(
	//array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Bankbook'), 'url'=>array('create')),
);


app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Manage Bankbooks"),
)); 
?>

 <?php 
 
 $form=kartik\form\ActiveForm::begin(array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
     'options' => array('enctype' => 'multipart/form-data'),
        )
    );
 
    $temp=\yii\helpers\ArrayHelper::map(app\models\Accounts::findAllByType(7), 'id', 'name');
    $temp[0]=Yii::t('app','Choose Bank');
    //$model->account_id=0;
 
        echo $form->field($model, "account_id")->widget(kartik\select2\Select2::className(),['data'=>$temp]);
        ?>
<div id ="result">
    <?php echo $this->render('ajax', array('model'=>$model)); ?>
</div>

<?php
kartik\form\ActiveForm::end();
 app\widgets\MiniForm::end();
?>


<?php
$java = <<<JS
$( "#Bankbook_account_id" ).change(function() {
            var value=$("#Bankbook_account_id").val();

            $.post( baseAddress+"/bankbook/ajax", { Bankbook: {account_id: value}} ).done(
                function( data )
                {
                    $( "#result" ).html( data );
                }
        
        );
          });

        
JS;
$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
        $java
        , \yii\web\View::POS_READY);
?>
