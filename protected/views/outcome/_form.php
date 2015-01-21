<div class="form">
    <div class="row">
        <div class="col-md-3">
            <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'outcome-form',
                'enableAjaxValidation' => true,
            ));
            ?>



            <?php echo $form->errorSummary($model); ?>




            <?php
            if ((int) $model->account_id != 0) {
                echo $form->hiddenField($model, 'account_id');
                echo "<h2>" . Accounts::model()->findByPk($model->account_id)->name . "</h2>";
            } else {
                echo $form->dropDownListRow($model, 'account_id', CHtml::listData(Accounts::model()->findAllByAttributes(array('type' => 1)), 'id', 'name')); //supplieres
            }
            ?>


            <?php echo $form->dropDownListRow($model, 'currency_id', CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name')); //currency  ?>

            <br />

            <?php echo $form->textFieldRow($model, 'sum'); ?>
            <?php //echo $form->textFieldRow($model, 'src_tax'); src tax is closed until we will support 854 report?>
            <?php echo $form->textFieldRow($model, 'details'); ?>



            <?php //echo $form->textFieldRow($model, 'refnum', array('size' => 5, 'maxlength' => 5)); ?>
            <div>
                <?php
                $this->widget('widgetRefnum', array(
                    'model' => $model, //Model object
                    'attribute' => 'refnum', //attribute name
                )); //*/
                ?>
            </div>



            <?php echo $form->labelEx($model, 'date'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(// you must specify name or model/attribute
                'name' => 'FormOutcome[date]',
                'language' => 'en',
                'options' => array(
                    'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                )
                    )
            );
            ?>
            <?php echo $form->error($model, 'date'); ?>

            <?php echo $form->dropDownListRow($model, 'opp_account_id', CHtml::listData(Accounts::model()->findAllByAttributes(array('type' => 7)), 'id', 'name')); //7=banks ?>



            <div class="form-actions">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'label' => Yii::t('app', "Create"),
                ));
                ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div><!-- form -->


<script type="text/javascript">
    function refNum(doc) {//


        $("#choseFormOutcome_refnum").dialog("close");

        $('#FormOutcome_refnum_div').html($('#FormOutcome_refnum_div').html() + ", " + doc.doctype + " #" + doc.docnum);
        $('#FormOutcome_refnum_ids').val($('#FormOutcome_refnum_ids').val() + doc.id + ",");



        return false;


    }

    /*
     
     //src tax is closed until we will support 854 report
     $("#FormOutcome_sum").change(function() {
     var sum = $('#FormOutcome_sum').val();
     $.get("<?php echo $this->createUrl('/'); ?>/index.php", {"r": "/accounts/JSON", "id": $("#FormOutcome_account_id").val()},
     function(data) {
     var src_tax=sum*(data.src_tax/100);
     $("#FormOutcome_sum").val(sum-src_tax);
     $("#FormOutcome_src_tax").val(src_tax);
     
     }, "json")
     .error(function() {
     });
     });*/
</script>