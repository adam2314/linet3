<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$this->params["menu"]=array(
	//array('label'=>'List Config','url'=>array('index')),
	//array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
app\widgets\MiniForm::begin(array('header' => Yii::t("app","Monthly Profit & Loss report"))); 
?>
<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'profloss-form',
	'enableAjaxValidation'=>false,
)); 
             echo Yii::t('app',"Select year");
 
            $year = date("Y");
            $max = $year + 1;
            $years=array();
            
            for($min = $year - 2; $min <= $max; $min++) 
                $years[$min]=$min;
            
            
            echo $form->field($model,'year')->widget(kartik\select2\Select2::className(),['data'=> $years]);              
            
?>




<div id ="result">
</div>



<?php kartik\form\ActiveForm::end(); ?>



    <?php 
app\widgets\MiniForm::end(); 
$java=<<<JS
        
        $( "#formmprofloss-year" ).change(function() {
            var value=$("#formmprofloss-year").val();
            $.post( baseAddress+"/reports/mproflossajax", { FormMprofloss: {year: value}} ).done(
                function( data ){
                    $( "#result" ).html( data );
                }
            );
            
          });    
        
        
        
JS;

 $this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
            $java
            , \yii\web\View::POS_READY);
   




?>


<script type="text/javascript">
    
    
</script>