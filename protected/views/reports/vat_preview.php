<?php 

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Vat Report"),
)); 

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'reportvat-form',
    //'enableAjaxValidation'=>true,
    
    'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
                               'onsubmit'=>"return false;",/* Disable normal form submit */
                               'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
            ),
)); 
?>
<div class='row'>
<div class='col-md-3'>
<?php
echo Yii::t('app','From Date').": ".$model->from_month;

echo $form->hiddenField($model,'step');
echo $form->hiddenField($model,'from_month');
echo $form->hiddenField($model,'year');              

echo "<br>";

echo Yii::t('app','To Date').": ".$model->to_month;
echo $form->hiddenField($model,'to_month');
//echo $form->hiddenField($model,'to_year');  
echo "<br>";
echo $form->hiddenField($model,'selvat_acc');  
echo $form->textFieldRow($model,'selvat_total');
echo $form->textFieldRow($model,'income_sum');
echo $form->textFieldRow($model,'income_sum_novat');
echo '<br />';



echo $form->hiddenField($model,'assetvat_acc');  
echo $form->textFieldRow($model,'assetvat_total');

echo $form->hiddenField($model,'buyvat_acc');  
echo $form->textFieldRow($model,'buyvat_total');
echo $form->textFieldRow($model,'payvat_total');

//echo CHtml::submitButton('',array('onclick'=>'send();')); 
?>
<div class="row form-actions">
        <?php
        
        if($model->payvat_total>0)
            $this->widget('bootstrap.widgets.TbButton', array(
                //'buttonType' => 'submit',
                'htmlOptions' => array('onclick' => 'return send();',),
                'type' => 'primary',
                'label' => Yii::t('app', "Commit"),
            ));
        ?>
    </div>
</div>
</div>
<?php
 $this->endWidget(); 

$this->endWidget(); 
?>

<script type="text/javascript">
 
function send()
 {
 
   var data=$("#reportvat-form").serialize();
 
 
  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("reports/vat"); ?>',
   data:data,
success:function(data){
                $('#content > div').html(data);
              },
   error: function(data) { // if error occured
         //alert("Error occured.please try again");
         alert(data);
    },
 
  dataType:'html'
  });
  
  return false;
 
}
 
</script>