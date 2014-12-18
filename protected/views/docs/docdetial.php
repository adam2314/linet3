<tr class="docContent">
    <td class="item_id"><b><?php echo $form->labelEx($model, 'item_id'); ?></b>

        <?php //echo $form->hiddenField($model, "[$i]id"); ?>
        <?php echo $form->hiddenField($model, "[$i]doc_id", array('class' => 'detail doc_id')); ?>
        <?php echo $form->hiddenField($model, "[$i]line", array('class' => 'detail line')); ?>
        
        

        <?php
        if ($model->item_id == '')
            $model->item_id = 0;

        $temp = CHtml::listData(Item::model()->findAll(), 'id', 'name');
        $temp[0] = Yii::t('app', 'None');
        echo $form->dropDownList($model, "[$i]item_id", $temp);
        ?>
    </td>




    <td><b><?php echo $form->labelEx($model, 'name'); ?></b><?php echo $form->textField($model, "[$i]name", array('class' => 'detail'));
        //echo $form->dropDownList($model, "[$i]name", CHtml::listData(Item::model()->findAll(), 'id', 'name')); 
        ?></td>

    <td><b><?php echo $form->labelEx($model, 'qty'); ?></b><?php echo $form->textField($model, "[$i]qty", array('class' => 'detail')); ?></td>
    <td><b><?php echo $form->labelEx($model, 'unit_id'); ?></b><?php echo $form->dropDownList($model, "[$i]unit_id", CHtml::listData(Itemunit::model()->findAll(), 'id', 'name'), array('class' => 'detail untSelect')); //,array()  ?></td>
    <td><b><?php echo $form->labelEx($model, 'iItem'); ?></b><?php echo $form->textField($model, "[$i]iItem", array('class' => 'detail',)); ?></td>
    <td><b><?php echo $form->labelEx($model, 'currency_id'); ?></b><?php echo $form->dropDownList($model, "[$i]currency_id", CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name'), array('class' => 'detail currSelect')); //,array()  ?></td>
    <td><b><?php echo $form->labelEx($model, 'iTotal'); ?></b>
        <div id="Docdetails_<?php echo $i; ?>_iTotallabel" ></div>
    </td>
    <td><b><?php echo $form->labelEx($model, 'iVatRate'); ?></b><?php
        echo $form->hiddenField($model, "[$i]iVatRate", array('class' => 'detail iVatRate'));
        echo $form->textField($model, "[$i]iTotalVat", array('class' => 'detail iVat'));
        ?>

    </td>
    <td class="remove">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Remove'),
            'icon' => 'glyphicon glyphicon-remove',
        ));
        ?>

        <input type="hidden" class="rowIndex" value="<?php echo $i; ?>" />
        <input id="Docdetails_<?php echo $i; ?>_ihItem" name="Docdetails[<?php echo $i; ?>][ihItem]" type="hidden" value="" class="detail ihItem" />
        <input id="Docdetails_<?php echo $i; ?>_iTotal"name="Docdetails[<?php echo $i; ?>][iTotal]" type="hidden" value="" class="detail iTotal" />
        <input id="Docdetails_<?php echo $i; ?>_ihTotal"name="Docdetails[<?php echo $i; ?>][ihTotal]" type="hidden" value="" class="detail ihTotal" />
    </td>
</tr>
<tr class="docSubContent">
    <td></td>
    <td colspan="5"><b><?php echo $form->labelEx($model, 'description'); ?></b><?php
        if ($i == 'ABC')
            echo $form->textField($model, "[$i]description", array('class' => 'detail'));
        else
            echo $form->textArea($model, "[$i]description", array('class' => 'detail','rows' => 1, 'cols' => 10));
        ?></td>
    <td></td>
    <td><b><?php echo $form->labelEx($model, 'invprice'); ?></b></td> 

</tr>    
<script type="text/javascript">

    $("#Docdetails_<?php echo $i; ?>_currency_id").chosen();
    $("#Docdetails_<?php echo $i; ?>_item_id").chosen();
    //$("#Docdetails_<?php echo $i; ?>_name").chosen();

    jQuery(function($) {
        //jQuery("#Docdetails_<?php echo $i; ?>_item_id").autocomplete({"minLength":0, "showAnim": "fold", "source": "/yii/demos/new/index.php?r=item/autocomplete"});
        CalcPrice(<?php echo $i; ?>);
    });
   

    $("#Docdetails_<?php echo $i; ?>_currency_id").change(function() {
        CalcPrice(<?php echo $i; ?>);
    });


    //$("#Docdetails_<?php echo $i; ?>_inclodeVat").change(function(){
    //   vatChange(<?php echo $i; ?>);  
    //});

    //$("#Docdetails_<?php echo $i; ?>_name").change(function(){
    //    nameChange(<?php echo $i; ?>);  
    //});

    $("#Docdetails_<?php echo $i; ?>_item_id").change(function() {
        itemChange(<?php echo $i; ?>);
    });


    $("#Docdetails_<?php echo $i; ?>_qty").change(function() {
        CalcPrice(<?php echo $i; ?>);
    });
    $("#Docdetails_<?php echo $i; ?>_iItem").change(function() {
        CalcPrice(<?php echo $i; ?>);
    });
    $("#Docdetails_<?php echo $i; ?>_iTotalVat").change(function() {
        CalcPrice(<?php echo $i; ?>, "CalcPriceWithVat");
    });
    //$("#Docdetails_<?php echo $i; ?>_invprice").change(function(){
    //    sumChange(<?php echo $i; ?>);  
    //});
    $(".remove").click(function() {
        //$(this).parents(".docContent:first:after").remove();
        $(this).parent().next().remove();
        $(this).parent().remove();
        //$(this).parents(".docContent:first").remove();
        CalcPriceSum();
        calcLines();
    });

</script>


