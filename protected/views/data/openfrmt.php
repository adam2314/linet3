<?php

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Open Format Create"))); 
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'openfrmt-form',
	'enableAjaxValidation'=>false,
)); 

?>
<div class="noPrint">
<?php
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
//echo CHtml::submitButton(Yii::t('app','Search')); 
?>
<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('app',"Go"),
		)); ?>
                <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'print',
			'type'=>'primary',
			'label'=>Yii::t('app',"Print"),
                    'htmlOptions'=>array(
                        'onclick'=>'js:window.print();'
                        )
		)); ?>
	</div>

</div>

<div id ="result">
</div>



<?php $this->endWidget(); ?>



    <?php 
$this->endWidget(); 
?>


<script type="text/javascript">
    jQuery(document).ready(function(){
        $("#openfrmt-form").submit(function(e){
                go(e);
	   });

    });
    
    function go(e){
        e.preventDefault();
        
        var from=$("#FormOpenfrmt_from_date").val();
        var to=$("#FormOpenfrmt_to_date").val();
            $.post( "<?php echo $this->createUrl('/data/openfrmt');?>", { FormOpenfrmt: {from_date: from, to_date: to}} ).done(
                function( data ){
                    $( "#result" ).html( data );
                }
            );
        
    }
    
    
</script>