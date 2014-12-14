<tr class="rcptContent">
    <td><b><?php echo $form->labelEx($model, 'type'); ?></b>
        <?php //echo $form->hiddenField($model, "[$i]id"); ?>
        <?php echo $form->hiddenField($model, "[$i]doc_id", array('class'=>'rcptdoc_id')); ?>
        <?php echo $form->hiddenField($model, "[$i]line", array('class'=>'rcptline')); ?>
        <?php //echo $form->hiddenField($model, "[$i]dep_date");  ?>
        <b><?php echo $form->labelEx($model, 'type'); ?></b>
            
            
            <?php 
            //Doctype::model()->getList()
            $temp=PaymentType::model()->getList();
            $temp[0]=Yii::t('app','None');
                
            
            echo $form->dropDownList($model, "[$i]type", $temp); 
            
            ?>
    </td>
    <td id="Doccheques_<?php echo $i; ?>_text"></td>


    <td><b><?php echo $form->labelEx($model, 'currency_id'); ?></b><?php echo $form->dropDownList($model, "[$i]currency_id", CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name'), array('class'=>'currSelect')); ?></td>
    <td><b><?php echo $form->labelEx($model, 'sum'); ?></b><?php echo $form->textField($model, "[$i]sum", array('class'=>'rcptsum','placeholder' => Yii::t('label', 'sum') )); ?></td>
    
    <td class="remove">
        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => Yii::t('app', 'Remove'),
                            'icon' => 'glyphicon glyphicon-remove',
                        ));
                        ?>


    </td>
<script type="text/javascript">
    $("#Doccheques_<?php echo $i; ?>_type").chosen();
    
    $( document ).ready(function() {
        rcptSum();
        <?php if($i=='ABC'){?>
        jQuery('#Doccheques_<?php echo $i; ?>_cheque_date').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['<?php echo substr(Yii::app()->language,0,2) ?>'], {'showAnim':'fold','dateFormat':'<?php echo Yii::app()->locale->getDateFormat('short')?>'}));
        <?php }?>
            
            
            
        $("#Doccheques_<?php echo $i; ?>_type").change(function(){
        TypeSelChange(<?php echo $i; ?>);  
    });
    });


    $("#Doccheques_<?php echo $i; ?>_sum").change(function(){
        rcptSum(); 
    });
    
    $(".remove").click(function() {
            
            $(this).parents(".rcptContent:first").remove();
            rcptcalcLines();
    });
    
</script>

</tr>