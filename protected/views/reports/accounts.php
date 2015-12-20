<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
use app\models\Acctype;
$this->params["menu"]= array(
        //array('label'=>'List Config','url'=>array('index')),
        //array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
?>

<?php
app\widgets\MiniForm::begin( array('header' => Yii::t("app", "Bulk Balance")));
?>
<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'bulkBalance-form',
    //'enableAjaxValidation' => true,
    
        ));
?>
<div class='row form-actions'>
    <div class='col-md-3'>
        <?= $form->field($model, 'from_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
        <?= $form->field($model, 'to_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
        
        <?= $form->field($model, 'acc'); ?>
        <?= Yii::t('app','Examples');?>: <br/>
        1-200<br/>
        1,3,5<br/>
        1-10,15-20,25-30<br/>
        
        <?php
        $temp = \yii\helpers\ArrayHelper::map(Acctype::find()->All(), 'id', 'name');
        $temp[""] = Yii::t('app', 'Choose Type');

        echo $form->field($model, 'type')->widget(kartik\select2\Select2::className(),['data'=>$temp]);
        ?>
        <div class="form-actions">
            <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-success']) ?>
            
        </div>



    </div>
</div>


<?php kartik\form\ActiveForm::end(); ?>


<div class='row'>
    <div class="col-xs-12" id ="result">
    </div>
</div>


<?php
app\widgets\MiniForm::end();
?>
<?php
$java = <<<JS
    $("#bulkBalance-form").submit(function (e) {
        e.preventDefault();
        send();
    });
        
function send(){
    var from = $("#formreportaccounts-from_date").val();
    var to = $("#formreportaccounts-to_date").val();
    var acc = $("#formreportaccounts-acc").val();
    var type = $("#formreportaccounts-type").val();
    $.post(baseAddress+'/reports/accounts', {FormReportAccounts: {from_date: from, to_date: to, acc: acc, type: type}}).done(
        function(data) {
            $("#result").html(data);
        }
    );
}
        
        
JS;

$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
        $java
        , \yii\web\View::POS_END);
?>

