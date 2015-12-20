<tr>
    <td>
        <?php 
        echo app\models\ItemVatCat::findName($model->itemVatCat_id);
        echo $form->field($model, "[$i]itemVatCat_id",['template' => '{input}'])->hiddenInput(); 
        ?>
    </td>
    <td>
        <?php 
        echo $form->field($model, "[$i]account_id",['template' => '{input}'])->widget(kartik\select2\Select2::classname(), ['data' => \yii\helpers\ArrayHelper::map(app\models\Accounts::findAllByType(3), 'id', 'name')]);
        ?>
    </td> 
</tr>
