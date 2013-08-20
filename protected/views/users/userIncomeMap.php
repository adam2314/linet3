<tr>
    <td>
        <?php 
        echo ItemVatCat::model()->findByPk($model->itemVatCat_id)->name;
        echo $form->hiddenField($model, "[$i]itemVatCat_id"); 
        ?>
    </td>
    <td>
        <?php 
        echo $form->dropDownList($model, "[$i]account_id", CHtml::listData(Accounts::model()->AutoComplete('',3), 'value', 'label'),array('class'=>'currSelect'));
        ?>
    </td> 
</tr>
