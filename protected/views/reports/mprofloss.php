<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$this->menu=array(
	//array('label'=>'List Config','url'=>array('index')),
	//array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
$this->beginWidget('MiniForm',array('header' => Yii::t("app","Monthly Profit & Loss report"))); 
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'profloss-form',
	'enableAjaxValidation'=>false,
)); 
             echo Yii::t('app',"Select year");
 
            $year = date("Y");
            $max = $year + 1;
            $years=array();
            
            for($min = $year - 2; $min <= $max; $min++) 
                $years[$min]=$min;
            
            
            echo $form->dropDownList($model,'year', $years);              
            
?>




<div id ="result">
</div>



<?php $this->endWidget(); ?>



    <?php 
$this->endWidget(); 
?>


<script type="text/javascript">
    jQuery(document).ready(function(){
       
    });
    
    
    
    $( "#FormMprofloss_year" ).change(function() {
            var value=$("#FormMprofloss_year").val();
            $.post( "<?php echo $this->createUrl('/reports/mproflossajax');?>", { FormMprofloss: {year: value}} ).done(
                function( data ){
                    $( "#result" ).html( data );
                }
            );
            
          });    
</script>