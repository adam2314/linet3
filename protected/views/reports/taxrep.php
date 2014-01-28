<?php 

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Tax Report"),
)); 

$form=$this->beginWidget('CActiveForm', array(
    'id'=>'reporttaxrep-form',
    //'enableAjaxValidation'=>true,
    
    'enableAjaxValidation'=>false,
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


echo Yii::t('app','From Date');


echo $form->dropDownList($model,'from_month',Yii::app()->locale->monthNames);
echo $form->dropDownList($model,'year', $years);              

echo "<br>";

echo Yii::t('app','To Date');
echo $form->dropDownList($model,'to_month',Yii::app()->locale->monthNames);
//echo $form->dropDownList($model,'to_year', $years);  
echo CHtml::submitButton('Go',array('onclick'=>'send();')); 

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