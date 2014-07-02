<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'outcome-form',
        'enableAjaxValidation' => true,
    ));
    ?>



<?php echo $form->errorSummary($model); ?>



    <?php echo $form->labelEx($model, 'account_id'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name' => 'FormOutcome[account_id]',
        'id' => 'FormOutcome_account_id',
        'value' => "$model->account_id",
        'source' => $this->createUrl('/accounts/autocomplete', array('type' => 1)),
        'options' => array(
            'minLength' => 0,
            'showAnim' => 'fold',
        ),
    ));
    ?>
<?php echo $form->error($model, 'account_id'); ?>



<?php echo $form->dropDownList($model, 'currency_id', CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name')); //currency  ?>

    <br />

    <?php echo $form->textFieldRow($model, 'sum'); ?>
    <?php echo $form->textFieldRow($model, 'detailes'); ?>
    
    
    
        <?php //echo $form->textFieldRow($model, 'refnum', array('size' => 5, 'maxlength' => 5)); ?>
    <div class="col-md-2">
            <?php echo $form->labelEx($model, 'refnum'); ?>
        <div id="Docsrefnum">
            
        </div>
        <?php echo CHtml::link(Yii::t('app', 'Clear refnum'), '#', array('onclick' => '$("#Docs_refnum_ids").val("");$("#Docsrefnum").html(""); return false;',)); ?>
        <br />
        <?php echo CHtml::link(Yii::t('app', 'Choose Doc'), '#', array('onclick' => '$("#choseRefDoc").dialog("open"); return false;',)); ?>

        <?php echo $form->hiddenField($model, 'refnum', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'refnum'); ?>
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

<?php echo $form->dropDownListRow($model, 'opp_account_id', CHtml::listData(Accounts::model()->findAllByAttributes(array('type' => 7)), 'id', 'name')); ?>



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

</div><!-- form -->