<tr>
    <td>
        <?php 
        use app\models\ItemVatCat;
        use app\models\Accounts;
        echo ItemVatCat::findName($model->itemVatCat_id);
        //echo $form->hiddenField($model, "[$i]itemVatCat_id"); 
        ?>
    </td>
    <td>
        <?php echo Accounts::findName($model->account_id);      ?>
    </td> 
</tr>
