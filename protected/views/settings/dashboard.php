<?php

$this->beginWidget('MiniForm',array('haeder' => Yii::app()->user->settings['company.name'] . ": " .Yii::t("app","Today Tasks and Events"),'class'=>'col-lg-12','fullscreen'=>false)); 

?>
<div class="row">
<?php    
$this->widget('invoiceReport',array('haeder' => Yii::t("app","Invoices to be collected"),'class'=>'col-lg-3'));

$this->widget('chequeReport',array('haeder' => Yii::t("app","Cheques and Cash to be deposited"),'class'=>'col-lg-3')); 

$this->widget('accReport',array('haeder' => Yii::t("app","Accounts Related events"),'class'=>'col-lg-3')); 

$this->widget('docReport',array('haeder' => Yii::t("app","Treat Needed Documents"),'class'=>'col-lg-3')); 
?>
</div>
<?php    
$this->endWidget(); 


$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Sales"),'class'=>'col-lg-12','fullscreen'=>false)); 
$this->endWidget(); 

$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Expenses"),'class'=>'col-lg-12','fullscreen'=>false)); 
$this->endWidget(); 

?>

<script type="text/javascript">
    $(function () {
    
        $('body').toggleClass('hide-sidebar');
    });
</script>