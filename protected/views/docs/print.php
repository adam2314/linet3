<?php


//$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","View Document ") ." " .$model->id,));
?>

	
<table>
        <tr>
                <td colspan="3" width="650">
                <h3><?php echo Yii::app()->user->settings['company.name']; ?></h3><br />
                <?php echo Yii::app()->user->settings['company.address']; ?><br />
                
                
                <?php echo Yii::app()->user->settings['company.vat.id']; ?><?php echo Yii::t('app','VAT No.'); ?><br />
                </td>

                <td>
                <?php echo Yii::app()->user->settings['company.logo']; ?>
                
                </td>
        </tr>
</table>
<hr />
<table>	
        <tr>
                <td width="50" style="text-align:top;"><?php echo Yii::t('app','To'); ?>:</td>
                <td width="400" ><?php echo $model->company; ?></td>
                <td width="150" ><?php echo Yii::t('app','Doc. Issued date'); ?>:</td>
                <td>
                <?php 
                echo date(Yii::app()->locale->getDateFormat('phpshort'),CDateTimeParser::parse($model->issue_date,Yii::app()->locale->getDateFormat('yiidatetime')));
                ?>
                </td>
        </tr>

        <tr>
                <td></td>
                <td><?php echo $model->address; ?></td>
                <td><?php echo Yii::t('app','Due date'); ?></td>
                <td>
                <?php  
                echo date(Yii::app()->locale->getDateFormat('phpshort'),CDateTimeParser::parse($model->due_date,Yii::app()->locale->getDateFormat('yiidatetime')));
                ?>
                </td>
        </tr>
        <tr>
                <td></td>
                <td><?php echo $model->city; ?> <?php echo $model->zip; ?></td>
                <td></td>
                <td></td>
        </tr>
        <tr>
                <td></td>
                <td><?php echo Yii::t('app','Vat No.'); ?>:<?php echo $model->vatnum; ?></td>
                <td></td>
                <td></td>
        </tr>

        <tr>
                <td colspan="4">
                        <div align="center"><h1><?php echo $model->docType->name; ?> <span style="font-size:25px;"> <?php echo Yii::t('app','No.'); ?> <?php echo $model->docnum; ?> </span>~copy~</h1></div>
                </td>
        </tr>
</table>
<?php
/******************************************************************************************************************************/

if(count($model->docDetailes)!=0){

?>

<table class="table">
        <tr>
                <th class='line'><?php echo Yii::t('app','Line'); ?></th>
                <th class='Itemid'><?php echo Yii::t('app','Item id'); ?></th>
                <th class='Name'><?php echo Yii::t('app','Name'); ?></th>
                <th class='Description'><?php echo Yii::t('app','Description'); ?></th>
                <th class='UntPrice'><?php echo Yii::t('app','Unt. Price'); ?></th>
                <th class='Unit'><?php echo Yii::t('app','Unit'); ?></th>
                <th class='Qty'><?php echo Yii::t('app','Qty.'); ?></th>
                <th class='Price'><?php echo Yii::t('app','Price'); ?></th>
                <th class='Currency'><?php echo Yii::t('app','Currency'); ?></th>
                
                <th class='Total'><?php echo Yii::t('app','Total'); ?></th>
                <th class='VAT'><?php echo Yii::t('app','VAT'); ?></th>

                
                
                
        </tr>
        <?php $i=0;
  

            foreach ($model->docDetailes as $docdetail){
                //print_r($docdetail);
                //echo $this->renderPartial('docdetialview', array('model'=>$docdetail,)); 
                echo "
                <tr>
                    <td class='line'>$docdetail->line</td>
                    <td class='Itemid'>$docdetail->item_id</td>
                    <td class='Name'>$docdetail->name</td>
                    <td class='Description'>$docdetail->description</td>
                        
                    
                    <td class='UntPrice'>$docdetail->unit_price</td>
                    <td class='Unit'>".$docdetail->ItemUnit->name."</td>
                    <td class='Qty'>$docdetail->qty</td>    
                    <td class='Price'>$docdetail->price</td>
                    <td class='Currency'>$docdetail->currency_id</td>
                    <td class='Total'>$docdetail->invprice</td>
                    <td class='VAT'>$docdetail->vat</td>
                 </tr>

                ";
                $i++;
            }
        ?>
        
        <tr>
                <td class='line'></td>
                <td class='Itemid'></td>
                <td class='Name'></td>
                <td class='Description'></td>
                <td class='UntPrice'></td>
                <td class='Unit'></td>
                <td class='Qty'></td>
                <td class='Price'></td>
                <td class='Currency'><?php echo Yii::t('app','Subtotal tax excluded'); ?></td>
                <td class='Total'><?php echo $model->sub_total; ?></td>
                <td class='VAT'><?php echo $model->vat; ?></td>
        <tr>
        <tr>
                <td class='line'></td>
                <td class='Itemid'></td>
                <td class='Name'></td>
                <td class='Description'></td>
                <td class='UntPrice'></td>
                <td class='Unit'></td>
                <td class='Qty'></td>
                <td class='Price'></td>
                <td class='Currency'><?php echo Yii::t('app','Subtotal tax exempt'); ?></td>
                <td class='Total'><?php echo $model->novat_total; ?></td>
                <td class='VAT'></td>
        </tr>
        
        <tr>
                <td class='line'></td>
                <td class='Itemid'></td>
                <td class='Name'></td>
                <td class='Description'></td>
                <td class='UntPrice'></td>
                <td class='Unit'></td>
                <td class='Qty'></td>
                <td class='Price'></td>
                <td class='Currency'><?php echo Yii::t('app','Subtotal to pay'); ?></td>
                <td class='Total'><?php echo $model->total; ?></td>
                <td class='VAT'></td>
        </tr>		
</table>
<?php
}


/******************************************************************************************************************************/
if(count($model->docCheques)!=0){

?>

                        
<table class="table">
        <tr>
            <th class='Type'><?php echo Yii::t('labels','Type'); ?></th>   
            <th class='Line'><?php echo Yii::t('labels','Line'); ?></th> 
            <th class='Refnum'><?php echo Yii::t('labels','Refnum'); ?></th>

            <th class='CreditCompany'><?php echo Yii::t('labels','Credit Company'); ?></th>
            <th class='ChequeNo'><?php echo Yii::t('labels','Cheque No.'); ?></th>
            <th class='Bank'><?php echo Yii::t('labels','Bank'); ?></th>
            <th class='Branch'><?php echo Yii::t('labels','Branch'); ?></th>
            <th class='ChequeAccount'><?php echo Yii::t('labels','Cheque Account'); ?></th>
            <th class='ChequeDate'><?php echo Yii::t('labels','Cheque Date'); ?></th>
            <th class='Currency'><?php echo Yii::t('labels','Currency'); ?></th>
            <th class='Sum'><?php echo Yii::t('labels','Sum'); ?></th>
            <th class='BankRefnum'><?php echo Yii::t('labels','Bank Refnum'); ?></th>
            <th class='DepDate'><?php echo Yii::t('labels','Dep Date'); ?></th> 
        </tr>
        <?php $i=0;
  

            foreach ($model->docCheques as $rcptdetail){
 
                echo "
                <tr>
                    <td class='Type'>$rcptdetail->type</td>
                    <td class='Line'>$rcptdetail->line</td>
                    <td class='Refnum'>$rcptdetail->refnum</td>
                    <td class='CreditCompany'>$rcptdetail->creditcompany</td>
                    <td class='ChequeNo'>$rcptdetail->cheque_num</td>
                        
                    <td class='Bank'>".$rcptdetail->bank."</td>
                    <td class='Branch'>$rcptdetail->branch</td>    
                    <td class='ChequeAccount'>$rcptdetail->cheque_acct</td>
                    <td class='ChequeDate'>$rcptdetail->cheque_date</td>
                    <td class='Currency'>$rcptdetail->currency_id</td>
                    <td class='Sum'>$rcptdetail->sum</td>
                    <td class='BankRefnum'>$rcptdetail->bank_refnum</td>
                    <td class='DepDate'>$rcptdetail->dep_date</td>
                 </tr>

                ";
                $i++;
            }
        ?>
 
          

</table>

<?php
/******************************************************************************************************************************/
}

?>


                <br />
        <?php echo Yii::t('app','Comments'); ?>: <?php echo $model->comments; ?>
        <br />
        <br />






<?php		
//$this->endWidget(); 
?>
<script type="text/javascript">
//$(function () {
    preview=<?php echo $preview;?>;
    
    if(preview==0){
        window.print();
        window.location = "<?php echo Yii::app()->CreateURL('docs/admin')?>"
        //return url
    }
//});

</script>