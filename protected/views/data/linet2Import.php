<?php
$this->menu = array(
        //array('label'=>'List AccTemplate','url'=>array('index')),
        //array('label'=>'Manage AccTemplate','url'=>array('admin')),
);

$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "Import Company From Linet 2.0"),
));
?>
<div class="form">


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'upload-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
    <div class="alert">
        <h4> <?php echo Yii::t('app', 'Warning') . ": " ?></h4><br>
        <?php echo Yii::t('app', 'All current compnay data will be removed:'); ?>
    </div>
    <?php echo $form->fileFieldRow($model, 'file'); ?>


    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => Yii::t('app', "Upload"),
        ));
        ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->

<div id ="result">
</div>

<?php
$this->endWidget();
?>

<script type="text/javascript">


</script>