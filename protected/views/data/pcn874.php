<?php

app\widgets\MiniForm::begin(array('header' => Yii::t("app","PCN874 Report"))); 
?>
<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'pcn874-form',
	'enableAjaxValidation'=>false,
)); 
?>
<?= $form->field($model, 'from_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
<?= $form->field($model, 'to_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>

    <div class="form-actions">
            <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-success']) ?>
    </div>




<div id ="result">
</div>



<?php kartik\form\ActiveForm::end(); ?>



    <?php 
app\widgets\MiniForm::end(); 
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
            $.post( "<?php echo yii\helpers\BaseUrl::base().('/data/pcn874ajax');?>", { FormReportPcn874: {from_date: from, to_date: to}} ).done(
                function( data ){
                    $( "#result" ).html( data );
                }
            );
        
    }
    
    $( "#year" ).change(function() {
            var value=$("#year").val();
            $.post( "<?php echo yii\helpers\BaseUrl::base().('/data/pcn874ajax');?>", { FormReportPcn874: {year: value}} ).done(
                function( data ){
                    $( "#result" ).html( data );
                }
            );
            
          });    
</script>