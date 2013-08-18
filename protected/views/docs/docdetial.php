<tr class="templateContent">
    <td><b><?php echo $form->labelEx($model, 'item_id'); ?></b>
        <?php echo $form->hiddenField($model, "[$i]id"); ?>
        <?php echo $form->hiddenField($model, "[$i]doc_id"); ?>
        <?php echo $form->hiddenField($model, "[$i]line"); ?>
        <?php
        //echo $form->textField($model,"[$i]item_id",array('size'=>10,'maxlength'=>10));


        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'value' => $model->item_id,
            'name' => "Docdetails[$i][item_id]",
            //'onblur'=>"hell",
            'source' => $this->createUrl('/item/autocomplete'), //costumer
            // additional javascript options for the autocomplete plugin
            'options' => array(
                'showAnim' => 'fold',
            ),
        ));


        /*
          <div style="width: 200px;"><?php echo $form->labelEx($model,'item_id'); ?></div>
          <div style="width: 110px;"><?php echo $form->labelEx($model,'name'); ?></div>
          <div style="width: 120px;"><?php echo $form->labelEx($model,'description'); ?></div>
          <div style="width: 65px;"><?php echo $form->labelEx($model,'qty'); ?></div>
          <div style="width: 90px;"><?php echo $form->labelEx($model,'unit_price'); ?></div>
          <div style="width: 110px;"><?php echo $form->labelEx($model,'currency'); ?></div>
          <div style="width: 90px;"><?php echo $form->labelEx($model,'price'); ?></div>
          <div style="width: 90px;"><?php echo $form->labelEx($model,'nisprice'); ?></div>
         */
        ?>
    </td>




    <td><b><?php echo $form->labelEx($model, 'name'); ?></b><?php echo $form->textField($model, "[$i]name", array('size' => 10, 'maxlength' => 255, 'style' => "width: 110px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'description'); ?></b><?php echo $form->textField($model, "[$i]description", array('rows' => 1, 'cols' => 10, 'style' => "width: 120px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'qty'); ?></b><?php echo $form->textField($model, "[$i]qty", array('size' => 5, 'maxlength' => 5, 'style' => "width: 65px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'unit_price'); ?></b><?php echo $form->textField($model, "[$i]unit_price", array('size' => 8, 'maxlength' => 8, 'style' => "width: 90px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'currency_id'); ?></b><?php echo $form->dropDownList($model, "[$i]currency_id", CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name')); ?></td>
    <td><b><?php echo $form->labelEx($model, 'price'); ?></b><?php echo $form->textField($model, "[$i]price", array('size' => 8, 'maxlength' => 8, 'style' => "width: 90px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'invprice'); ?></b><?php echo $form->textField($model, "[$i]invprice", array('size' => 8, 'maxlength' => 8, 'style' => "width: 90px;")); ?></td>

    <td class="remove"><?php echo Yii::t('ui', 'Remove'); ?>
        <input type="hidden" class="rowIndex" value="<?php echo $i; ?>" />
        <input id="Docdetails_<?php echo $i; ?>_src_tax"type="hidden" value="" />
        <input id="Docdetails_<?php echo $i; ?>_rate"type="hidden" value="1" />
    </td>
<script type="text/javascript">
    jQuery(function($) {
        jQuery("#Docdetails_<?php echo $i; ?>_item_id").autocomplete({"showAnim": "fold", "source": "/yii/demos/new/index.php?r=item/autocomplete"});
    });
</script>

</tr>
