



<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'bankbook-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'options' => array('enctype' => 'multipart/form-data'),
        ));
?>
<?php echo $form->field($model, 'file')->fileInput(); ?>

<div class="row buttons">
     <?= \yii\helpers\Html::submitButton( Yii::t('app', 'Import'), ['class' => 'btn btn-success' ]) ?>
    

</div>

<?php kartik\form\ActiveForm::end(); ?>



<?php
echo app\widgets\GridView::widget( array(
    'id' => 'bankbook-grid',
    'dataProvider' => $model->dp(),
    ////'filter'=>$model,
    'columns' => array(
        'id',
        'account_id',
        'details',
        'refnum',
        'date',
        'sum',
        'total',
        array(
            'class' => 'yii\grid\ActionColumn',
        ),
    ),
));
?>