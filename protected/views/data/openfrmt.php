<?php
app\widgets\MiniForm::begin(array('header' => Yii::t("app", "Open Format Create")));
?>
<?php
$form = kartik\form\ActiveForm::begin(array(
            'id' => 'openfrmt-form',
            'enableAjaxValidation' => false,
        ));
?>
<div class="noPrint">
    <?= $form->field($model, 'from_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
    <?= $form->field($model, 'to_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
    <div class="form-actions">    
        <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-success']) ?>

    </div>

</div>

<div id ="result">
</div>



<?php kartik\form\ActiveForm::end(); ?>



<?php app\widgets\MiniForm::end();?>
