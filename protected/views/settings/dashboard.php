<?php
$this->menu = array(
    array('label' => Yii::t('app', 'invoiceReport'), 'url' => '#', 'linkOptions' => array('onclick' => 'javascript: send("invoiceReport");')),
    array('label' => Yii::t('app', 'chequeReport'), 'url' => '#', 'linkOptions' => array('onclick' => 'javascript: send("chequeReport");')),
    array('label' => Yii::t('app', 'accReport'), 'url' => '#', 'linkOptions' => array('onclick' => 'javascript: send("accReport");')),
    array('label' => Yii::t('app', 'outcomeReport'), 'url' => '#', 'linkOptions' => array('onclick' => 'javascript: send("outcomeReport");')),
    array('label' => Yii::t('app', 'salesReport'), 'url' => '#', 'linkOptions' => array('onclick' => 'javascript: send("salesReport");')),
    array('label' => Yii::t('app', 'docReport'), 'url' => '#', 'linkOptions' => array('onclick' => 'javascript: send("docReport");')),
);
?>



<div class="row">
<?php
if (isset(Yii::app()->user->widget)) {
    $widgets = array(
        array('invoiceReport', "Invoices to be collected", 'col-lg-4'),
        array('chequeReport', "Income and Expenses", 'col-lg-4'),
        array('accReport', "Accounts Related events", 'col-lg-4'),
        array('outcomeReport', "Suppliers Payments", 'col-lg-4'),
        array('salesReport', "Pending Sales Orders", 'col-lg-3'),
        array('docReport', "Treat Needed Documents", 'col-lg-5'),
    );
    foreach ($widgets as $widget) {

        if (isset(Yii::app()->user->widget[$widget[0]])) {
            if (Yii::app()->user->widget[$widget[0]]) {
                $this->widget($widget[0], array('header' => Yii::t("app", $widget[1]), 'height' => 350, 'class' => $widget[2]));
            }
        } else {
            $this->widget($widget[0], array('header' => Yii::t("app", $widget[1]), 'height' => 350, 'class' => $widget[2]));
        }
    }
}
?>

</div>




<?php
//$this->endWidget(); 
?>

<script type="text/javascript">
    $(function() {
        $('body').toggleClass('hide-sidebar');
    });


    function send(str) {
        $.post("<?php echo $this->createUrl('/'); ?>/settings/dashboard", {"Widget": str},
        function(data) {
            window.location = "<?php echo Yii::app()->createAbsoluteUrl('/settings/dashboard'); ?>";
        });
    }
</script>