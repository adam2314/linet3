<?php

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Bug Report"),
));



$form = kartik\form\ActiveForm::begin(array(
            'id' => 'bug-form',
                //'enableAjaxValidation'=>false,
        ));
?>





<?= $form->field($model, 'title'); ?>

<?= $form->field($model, 'body')->textArea(); ?>

<?= \yii\helpers\Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-success']);?>

<?php kartik\form\ActiveForm::end();?>
<?= yii\widgets\ListView::widget(array(
    'dataProvider' => $dataProvider,
    'itemView' => '_bugView',
));
?>

<?php app\widgets\MiniForm::end();?>