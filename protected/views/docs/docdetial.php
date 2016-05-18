<?php
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
?>


<tr class="docContent">
    <td class="item_id">

        <?php //echo $form->hiddenField($model, "[$i]id"); ?>
        <?php //echo $form->field($model, "[$i]doc_id",['template'=>'{input}'])->hiddenInput(); ?>
        <?php //echo $form->field($model, "[$i]line",['template'=>'{input}'])->hiddenInput(); ?>
        
        <input id="docdetails-<?= $i; ?>-doc_id" name="Docdetails[<?= $i; ?>][doc_id]" type="hidden" value="<?= $model->doc_id;?>" />
        <input id="docdetails-<?= $i; ?>-line" name="Docdetails[<?= $i; ?>][line]" type="hidden" value="<?= $model->line;?>" />

        <?php
        if ($model->item_id == '')
            $model->item_id = 0;

        $model->income_acc=100;
        $items=ArrayHelper::map(\app\models\Item::find()->All(), 'id', 'name');
        $itemunit=ArrayHelper::map(\app\models\Itemunit::find()->All(), 'id', 'name');
        $currency=ArrayHelper::map(\app\models\Currates::GetRateList(), 'currency_id', 'name');
        //$temp = \yii\helpers\ArrayHelper::map(Item::find()->All(), 'id', 'name');
        //$temp[0] = Yii::t('app', 'None');
        echo $form->field($model, "[$i]item_id" )->dropDownList($items);//select2/$temp
        
        ?>
    </td>




    <td>
        <?php //echo $form->field($model, "[$i]name");?>
       <!-- <label class="control-label" for="docdetails-<?= $i; ?>-name"><?= $model->name;?></label>-->
        <input id="docdetails-<?= $i; ?>-name" name="Docdetails[<?= $i; ?>][name]" value="<?= $model->name;?>" class="form-control" />
        <div class="help-block"></div>
    </td>

    <td><?php echo $form->field($model, "[$i]qty")->input('number',['step'=>"any"]); ?></td>
    <td><?php echo $form->field($model, "[$i]unit_id")->dropDownList($itemunit);  ?></td>
    <td>
        <?php echo $form->field($model, "[$i]iItem")->input('number',['step'=>"any"]); ?>
        <?php echo $form->field($model, "[$i]income_acc"); ?>
    </td>
    <td>
        <?php echo $form->field($model, "[$i]currency_id")->dropDownList($currency);  ?>
        <?php echo $form->field($model, "[$i]currency_rate");  ?>
    
    </td>
    <td><div id="docdetails-<?php echo $i; ?>-iTotallabel" ></div></td>
    <td><?php
        echo $form->field($model, "[$i]iVatRate",['template'=>'{input}'])->hiddenInput();
        echo $form->field($model, "[$i]iTotalVat")->input('number',['step'=>"any"]);
        ?>

    </td>
    <td class="detRemove">
        <?php
        echo yii\bootstrap\Button::widget([
            'label' => Yii::t('app', 'Remove'),
            'options'=>['class'=>'btn btn-danger']
            //'icon' => 'glyphicon glyphicon-remove',
        ]);
        ?>

        <input type="hidden" class="rowIndex" value="<?php echo $i; ?>" />
        <input id="Docdetails-<?php echo $i; ?>-ihItem" name="Docdetails[<?php echo $i; ?>][ihItem]" type="hidden" value="<?= $model->ihItem;?>" />
        <input id="Docdetails-<?php echo $i; ?>-iTotal"name="Docdetails[<?php echo $i; ?>][iTotal]" type="hidden" value="<?= $model->iTotal;?>"  />
        <input id="Docdetails-<?php echo $i; ?>-ihTotal"name="Docdetails[<?php echo $i; ?>][ihTotal]" type="hidden" value="<?= $model->ihTotal;?>" />
    </td>
</tr>
<tr class="docSubContent">
    <td></td>
    <td colspan="5"><b><?php //echo $form->labelEx($model, 'description'); ?></b><?php
        if ($i == 'ABC')
            echo $form->field($model, "[$i]description");
        else
            echo $form->field($model, "[$i]description");//textArea
        ?></td>
    <td></td>
    <td><b><?php //echo $form->labelEx($model, 'invprice'); ?></b></td> 

</tr>    


<?php
$java= <<< JAVA
    $("#docdetails-$i-currency_id").select2();
    $("#docdetails-$i-item_id").select2();
    $("#docdetails-$i-unit_id").select2();

    jQuery(function($) {
        CalcPrice($i);
    });

JAVA;

if($i==='ABC'){
    //echo '<script type="text/javascript">'.$java.'</script>';
}else{
    //echo '<script type="text/javascript">'.$java.'</script>';
    $this->registerJs($java, \yii\web\View::POS_READY);
}
?>
