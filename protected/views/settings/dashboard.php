<?php

$this->beginWidget('MiniForm',array('haeder' => Yii::app()->user->settings['company.name'] . ": " .Yii::t("app","Today Tasks and Events"),'class'=>'col-lg-12','fullscreen'=>false)); 

?>
<div class="row">
<?php    
$this->widget('invoiceReport',array('haeder' => Yii::t("app","Invoices to be collected"),'class'=>'col-lg-4'));

$this->widget('chequeReport',array('haeder' => Yii::t("app","Cheques and Cash to be deposited"),'class'=>'col-lg-4')); 

$this->widget('accReport',array('haeder' => Yii::t("app","Accounts Related events"),'class'=>'col-lg-4')); 


?>
</div>


<div class="row">
<?php    

$this->widget('salesReport',array('haeder' => Yii::t("app","Pending Sales Orders"),'class'=>'col-lg-4')); 

$this->widget('outcomeReport',array('haeder' => Yii::t("app","Suppliers Payments"),'class'=>'col-lg-4')); 

$this->widget('docReport',array('haeder' => Yii::t("app","Treat Needed Documents"),'class'=>'col-lg-4')); 
?>
</div>




<?php    
$this->endWidget(); 



?>

<script type="text/javascript">
    $(function () {
    
        $('body').toggleClass('hide-sidebar');
    });
</script>