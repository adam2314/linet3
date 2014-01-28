<?php

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","PCN874 Report"))); 
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pcn874-form',
	'enableAjaxValidation'=>false,
)); 



echo Yii::t('app','From Date');

Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
///*
$this->widget('CJuiDateTimePicker',array(
    'model'=>$model, //Model object
    'attribute'=>'from_date', //attribute name
    'mode'=>'datetime', 
    'language' => substr(Yii::app()->language,0,2),
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
    ) // jquery plugin options
));

?>

<br />
<?php

echo Yii::t('app','To Date');

$this->widget('CJuiDateTimePicker',array(
    'model'=>$model, //Model object
    'attribute'=>'to_date', //attribute name
    'mode'=>'datetime', //use "time","date" or "datetime" (default)
    'language' => substr(Yii::app()->language,0,2),
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
        

    ) // jquery plugin options
));
echo CHtml::submitButton(Yii::t('app','Search')); 
?>




<div id ="result">
</div>



<?php $this->endWidget(); ?>



    <?php 
$this->endWidget(); 
?>


<script type="text/javascript">
    jQuery(document).ready(function(){
       // $("#pcn874-form").submit(function(e){
       //         go(e);
	//   });

    });
    
    function go(e){
        e.preventDefault();
        
        var from=$("#FormReportPcn874_from_date").val();
        var to=$("#FormReportPcn874_to_date").val();
            $.post( "<?php echo $this->createUrl('/data/pcn874ajax');?>", { FormReportPcn874: {from_date: from, to_date: to}} ).done(
                function( data ){
                    $( "#result" ).html( data );
                }
            );
        
    }
    
    $( "#year" ).change(function() {
            var value=$("#year").val();
            $.post( "<?php echo $this->createUrl('/data/pcn874ajax');?>", { FormReportPcn874: {year: value}} ).done(
                function( data ){
                    $( "#result" ).html( data );
                }
            );
            
          });    
</script>