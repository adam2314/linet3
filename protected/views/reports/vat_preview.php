<?php 

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Vat Report"),
)); 

$form=$this->beginWidget('CActiveForm', array(
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
echo Yii::t('app','From Date');

echo $form->hiddenField($model,'step');
echo $form->hiddenField($model,'from_month');
echo $form->hiddenField($model,'year');              

echo "<br>";

echo Yii::t('app','To Date');
echo $form->hiddenField($model,'to_month');
//echo $form->hiddenField($model,'to_year');  

echo $form->hiddenField($model,'selvat_acc');  
echo $form->textField($model,'selvat_total');
echo $form->textField($model,'income_sum');
echo $form->textField($model,'income_sum_novat');
echo '<br />';



echo $form->hiddenField($model,'assetvat_acc');  
echo $form->textField($model,'assetvat_total');

echo $form->hiddenField($model,'buyvat_acc');  
echo $form->textField($model,'buyvat_total');
echo $form->textField($model,'payvat_total');

//echo CHtml::submitButton('',array('onclick'=>'send();')); 
?>
<div class="row form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            //'buttonType' => 'submit',
            'htmlOptions' => array('onclick' => 'return send();',),
            'type' => 'primary',
            'label' => Yii::t('app', "Pay"),
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