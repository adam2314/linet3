<tr class="rcptContent">
    <td><b><?php //echo $form->labelEx($model, 'type'); ?></b>
        <?= $form->field($model, "[$i]doc_id")->hiddenInput(); ?>
        <?= $form->field($model, "[$i]line")->hiddenInput(); ?>
        <b><?php //echo $form->labelEx($model, 'type'); ?></b>
            
            
            <?php 
            //Doctype::getList()
            $temp=\app\models\PaymentType::getList();
            $temp[0]=Yii::t('app','None');
            $curr=\yii\helpers\ArrayHelper::map(\app\models\Currates::GetRateList(), 'currency_id', 'name');    
            
            echo $form->field($model, "[$i]type")->dropDownList($temp); 
            
            ?>
    </td>
    <td id="Doccheques_<?php echo $i; ?>_text"></td>


    <td><b><?php //echo $form->labelEx($model, 'currency_id'); ?></b><?php echo $form->field($model, "[$i]currency_id")->dropDownList($curr); ?></td>
    <td><b><?php //echo $form->labelEx($model, 'sum'); ?></b><?php echo $form->field($model, "[$i]sum",['inputOptions'=>['class'=>'rcptsum']]); ?></td>
    
    <td class="chqRemove">
        <?php
        echo yii\bootstrap\Button::widget([
            'label' => Yii::t('app', 'Remove'),
            'options'=>['class'=>'btn btn-danger']
            //'icon' => 'glyphicon glyphicon-remove',
        ]);
        ?>


    </td>
<script type="text/javascript">
    //$("#doccheques-<?php echo $i; ?>-type").select2();
    //$("#doccheques-<?php echo $i; ?>-currency_id").select2();
    $( document ).ready(function() {
        rcptSum();
        <?php if($i=='ABC'){?>
        //jQuery('#doccheques-<?php echo $i; ?>-cheque_date').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['<?php echo substr(Yii::$app->language,0,2) ?>'], {'showAnim':'fold'}));//,'dateFormat':'<?php //echo Yii::$app->locale->getDateFormat('short')?>'
        <?php }?>
            
            
            
        $("#doccheques-<?php echo $i; ?>-type").change(function(){
        TypeSelChange(<?php echo $i; ?>);  
    });
    });


    
</script>

</tr>