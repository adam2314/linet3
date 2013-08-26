<tr class="docContent">
    <td><b><?php echo $form->labelEx($model, 'item_id'); ?></b>
        <?php //echo $form->hiddenField($model, "[$i]id"); ?>
        <?php echo $form->hiddenField($model, "[$i]doc_id"); ?>
        <?php echo $form->hiddenField($model, "[$i]line"); ?>
        <?php 
        if($model->currency_id=='')
            $cur=1;
        else 
            $cur=Currates::model()->GetRate($model->currency_id);
        echo CHTML::hiddenField("Docdetails_${i}_rate",$cur);?>
        <?php 
        if($model->item_id=='')
            $vat=0;
        else 
            $vat=Item::model()->findByPk($model->item_id)->vat;
        echo CHTML::hiddenField("Docdetails_${i}_accvat",$vat);

        //echo $form->textField($model,"[$i]item_id",array('size'=>10,'maxlength'=>10, 'style' => "width: 60px;"));

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

        ?>
    </td>




    <td><b><?php echo $form->labelEx($model, 'name'); ?></b><?php echo $form->textField($model, "[$i]name", array('size' => 10, 'maxlength' => 255, 'style' => "width: 110px;")); 
                                                                    //echo $form->dropDownList($model, "[$i]name", CHtml::listData(Item::model()->findAll(), 'id', 'name')); ?></td>
    <td><b><?php echo $form->labelEx($model, 'description'); ?></b><?php echo $form->textField($model, "[$i]description", array('rows' => 1, 'cols' => 10, 'style' => "width: 120px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'qty'); ?></b><?php echo $form->textField($model, "[$i]qty", array('size' => 5, 'maxlength' => 5, 'style' => "width: 60px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'unit_price'); ?></b><?php echo $form->textField($model, "[$i]unit_price", array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'currency_id'); ?></b><?php echo $form->dropDownList($model, "[$i]currency_id", CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name'), array('class'=>'currSelect','style' => "width: 70px;"));//,array() ?></td>
    <td><b><?php echo $form->labelEx($model, 'price'); ?></b><?php echo $form->textField($model, "[$i]price", array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'invprice'); ?></b><?php echo $form->textField($model, "[$i]invprice", array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?></td>
    <td><b><?php echo $form->labelEx($model, 'vat'); ?></b><?php 
                                                                    echo CHTML::checkBox("Docdetails_${i}_inclodeVat",'', array('value'=>1, 'uncheckValue'=>0));
                                                                    echo $form->hiddenField($model, "[$i]vat", array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); 
                                                                    
                                                                    
                                                                    ?>
                                                                    <div id="Docdetails_<?php echo $i; ?>_vatlabel" ></div
                                                                    </td>
    <td class="remove"><?php echo Yii::t('ui', 'Remove'); ?>
        <input type="hidden" class="rowIndex" value="<?php echo $i; ?>" />
        <input id="Docdetails_<?php echo $i; ?>_src_tax"type="hidden" value="" />
        <input id="Docdetails_<?php echo $i; ?>_rate"type="hidden" value="1" />
    </td>
<script type="text/javascript">
    
    $("#Docdetails_<?php echo $i; ?>_currency_id").chosen();
    //$("#Docdetails_<?php echo $i; ?>_name").chosen();
    
    jQuery(function($) {
        jQuery("#Docdetails_<?php echo $i; ?>_item_id").autocomplete({"minLength":0, "showAnim": "fold", "source": "/yii/demos/new/index.php?r=item/autocomplete"});
        CalcPrice(<?php echo $i; ?>);
    });
    var det=true;
    $("#Docdetails_<?php echo $i; ?>_item_id").focus(function(){
        if($("#Docdetails_<?php echo $i; ?>_item_id").val()=='' && det){
            $("#Docdetails_<?php echo $i; ?>_item_id").autocomplete("search","");
            det=false;
        }
    });




    $("#Docdetails_<?php echo $i; ?>_currency_id").change(function(){
        currChange(<?php echo $i; ?>);  
    });
    
    
    $("#Docdetails_<?php echo $i; ?>_inclodeVat").change(function(){
        vatChange(<?php echo $i; ?>);  
    });
    
    //$("#Docdetails_<?php echo $i; ?>_name").change(function(){
    //    nameChange(<?php echo $i; ?>);  
    //});
    
    $("#Docdetails_<?php echo $i; ?>_item_id").blur(function(){
        itemChange(<?php echo $i; ?>);  
    });
    
    
    $("#Docdetails_<?php echo $i; ?>_qty").change(function(){
        detChange(<?php echo $i; ?>);  
    });
    $("#Docdetails_<?php echo $i; ?>_unit_price").change(function(){
        detChange(<?php echo $i; ?>);  
    });
    $("#Docdetails_<?php echo $i; ?>_price").change(function(){
        priceChange(<?php echo $i; ?>);  
    });
    $("#Docdetails_<?php echo $i; ?>_invprice").change(function(){
        sumChange(<?php echo $i; ?>);  
    });
    $(".remove").click(function() {
            
            $(this).parents(".docContent:first").remove();
            CalcPriceSum();
            calcLines();
    });
    
</script>

</tr>
