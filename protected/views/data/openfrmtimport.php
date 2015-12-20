<?php
$this->params["menu"] = array(
        //array('label'=>'List AccTemplate','url'=>array('index')),
        //array('label'=>'Manage AccTemplate','url'=>array('admin')),
);

app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "Import open Format Files"),
));
?>
<div class="form">


<?php
$form = kartik\form\ActiveForm::begin(array(
            'id' => 'upload-form',
            //'enableAjaxValidation' => true,
            'options' => array('enctype' => 'multipart/form-data'),
        ));
?>
    <?php //echo Yii::t('app','Worrinng:').Yii::t('app','All current compnay data will be removed:'); ?>

    <?= $form->field($model, 'iniFile')->fileInput(); ?>
    <?= $form->field($model, 'bkmvFile')->fileInput(); ?>

    <div class="form-actions">
        <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Upload'), ['class' => 'btn btn-success']) ?>

    </div>
    <?php kartik\form\ActiveForm::end(); ?>



</div><!-- form -->

<div id ="result">
</div>

<?php
app\widgets\MiniForm::end();
?>

<script type="text/javascript">


</script>