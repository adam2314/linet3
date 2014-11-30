<?php 

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Tax Report"),
)); 

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'reporttaxrep-form',
    //'enableAjaxValidation'=>true,
    
    'enableAjaxValidation'=>true,
        'htmlOptions'=>array(
                               'onsubmit'=>"return false;",/* Disable normal form submit */
                               'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
            ),
)); 
$year = date("Y");
$max = $year + 1;
$years=array();

for($min = $year - 2; $min <= $max; $min++) 
    $years[$min]=$min;
?>

<div class='row'>
<div class='col-md-3'>
<?php
//echo Yii::t('app','From Date');


echo $form->dropDownListRow($model,'from_month',Yii::app()->locale->monthNames);
echo $form->dropDownListRow($model,'year', $years);              

echo "<br>";

//echo Yii::t('app','To Date');
echo $form->dropDownListRow($model,'to_month',Yii::app()->locale->monthNames);
//echo $form->dropDownList($model,'to_year', $years);  
//echo CHtml::submitButton('Go',array('onclick'=>'send();')); 
?>
    <div class="row form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            //'buttonType' => 'submit',
            'htmlOptions' => array('onclick' => 'return send();',),
            'type' => 'primary',
            'label' => Yii::t('app', "Go"),
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
 
function send() {
 
   var data=$("#reporttaxrep-form").serialize();
 
 
  $.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("reports/taxrep"); ?>',
   data:data,
success:function(data){
                //alert(data); 
                $('#content > div').html(data);
              },
   error: function(data) { // if error occured
         alert(data);
    },
 
  dataType:'html'
  });
 
}
 
</script>