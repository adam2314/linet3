<?php
$this->params["menu"] = array(
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
//if (isset($user->getWidgets())) {
    $widgets = array(
        array('app\widgets\invoiceReport', "Invoices to be collected", 'col-lg-4'),
        array('app\widgets\chequeReport', "Income and Expenses", 'col-lg-4'),
        array('app\widgets\accReport', "Accounts Related events", 'col-lg-4'),
        array('app\widgets\outcomeReport', "Suppliers Payments", 'col-lg-4'),
        array('app\widgets\salesReport', "Pending Sales Orders", 'col-lg-3'),
        array('app\widgets\docReport', "Treat Needed Documents", 'col-lg-5'),
    );
    $userWidgets = $user->getWidgets();
    $i = 0;
    foreach ($widgets as $widget) {
        if ($i == 3)
            echo "</div><div class='row'>";
        if (isset($userWidgets[$widget[0]])) {
            if ($userWidgets[$widget[0]]) {
                echo "<div class='$widget[2]'>".$widget[0]::widget(array('header' => Yii::t("app", $widget[1])))."</div>";
                $i++;
            }
        } else {


            echo "<div class='$widget[2]'>".$widget[0]::widget(array('header' => Yii::t("app", $widget[1])))."</div>";
            $i++;
        }
        
    }
//}
    ?>

</div>




<?php
$this->registerJs("$('#sidebar').trigger('hide');"
        , \yii\web\View::POS_READY);
?>

<script type="text/javascript">
    //$(function() {
    //    $('body').toggleClass('hide-sidebar');
    //});


    function send(str) {
        $.post("<?php echo yii\helpers\BaseUrl::base() . ('/'); ?>/settings/dashboard", {"Widget": "app\\widgets\\" + str},
        function (data) {
            window.location = "<?php echo yii\helpers\BaseUrl::base() . ('/settings/dashboard'); ?>";
        });
    }
</script>