<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$logopath = Yii::app()->createAbsoluteUrl("site/download/" . Yii::app()->user->getSetting('company.logo'));
$legalize = "";
if ($preview == 2) {
    $legalize = Yii::t('app', 'Computerized Document');
}
//$this->beginWidget('MiniForm',array('header' => Yii::t("app","View Document ") ." " .$model->id,));
?>
<div class="body">
    <div class="docHead">
        <div class="fromBox">
            <h3><?php echo Yii::app()->user->getSetting('company.name'); ?></h3><br />
            <?php echo Yii::app()->user->getSetting('company.address'); ?>, <?php echo Yii::app()->user->getSetting('company.city'); ?> ,<?php echo Yii::app()->user->settings['company.zip']; ?><br />
            <?php echo Yii::t('app', 'Phone'); ?>: <?php echo Yii::app()->user->getSetting('company.phone'); ?><br />
            <?php echo Yii::t('app', 'Fax'); ?>: <?php echo Yii::app()->user->getSetting('company.fax'); ?><br />
            <?php echo Yii::app()->user->getSetting('company.website'); ?><br />

            <?php echo Yii::t('app', 'VAT No.'); ?>: <?php echo Yii::app()->user->getSetting('company.vat.id'); ?><br />
        </div>


        <div  class="logo">
            <img class="logo" alt="logo" src="<?php echo $logopath; ?>" />
        </div>
    </div>

    <hr class="lineHR" />
    <div class="toBox">
        <table>	
            <tr>
                <td><?php echo Yii::t('app', 'To'); ?>:</td>
                <td><?php echo $model->company; ?></td>

            </tr>

            <tr>
                <td></td>
                <td><?php echo $model->address; ?></td>

            </tr>
            <tr>
                <td></td>
                <td><?php echo $model->city; ?> <?php echo $model->zip; ?></td>

            </tr>
            <tr>
                <td></td>
                <td><?php echo Yii::t('app', 'VAT No.'); ?>:<?php echo $model->vatnum; ?></td>

            </tr>

        </table>

    </div>


    <div class="toDate">
        <table>	
            <tr>

                <td><?php echo Yii::t('app', 'Doc. Issued date'); ?>:</td>
                <td>
                    <?php echo date(Yii::app()->locale->getDateFormat('phpshort'), CDateTimeParser::parse($model->issue_date, Yii::app()->locale->getDateFormat('yiidatetime'))); ?>
                </td>
            </tr>

            <tr>

                <td><?php echo Yii::t('app', 'Due date'); ?>:</td>
                <td>
                    <?php echo date(Yii::app()->locale->getDateFormat('phpshort'), CDateTimeParser::parse($model->due_date, Yii::app()->locale->getDateFormat('yiidatetime'))); ?>
                </td>
            </tr>
            <?php
            if (($model->doctype==14)||($model->doctype==13)) {
                ?>
                <tr>

                    <td><?php echo Yii::t('app', 'Reference date'); ?>:</td>
                    <td>
                        <?php echo date(Yii::app()->locale->getDateFormat('phpshort'), CDateTimeParser::parse($model->ref_date, Yii::app()->locale->getDateFormat('yiidatetime'))); ?>
                    </td>
                </tr> 
                <?php
            }
            ?>
        </table>

    </div>
    <div class="legalize"><h3><?php echo $legalize ?></h3></div>
    <div class="docTitle"><h1><?php echo Yii::t('app', $model->docType->name); ?> <span style="font-size:25px;"> <?php echo Yii::t('app', 'No.'); ?> <?php echo $model->docnum; ?> </span>
            <span id='stamp'> 
                <?php
                if ($model->docType->copy) {
                    if ($model->action == 0) {
                        echo Yii::t('app', 'Draft');
                    } else {
                        echo ($model->printed == 1) ? Yii::t('app', 'Source') : Yii::t('app', 'Copy');
                    }
                }
                ?>
            </span>           
        </h1></div>
    <div>
        <?php
        /*         * *************************************************************************************************************************** */

        if (count($model->docDetailes) != 0) {//
            ?>

            <table class="printtbl table">
                <thead>
                    <tr>
                        <!--<th class='line'><?php echo Yii::t('app', 'Line'); ?></th>
                        <th class='Itemid'><?php echo Yii::t('app', 'Item id'); ?></th>-->
                        <th class='Name'><?php echo Yii::t('app', 'Name'); ?></th>
                        <th class='UntPrice'><?php echo Yii::t('app', 'Unt. Price'); ?></th>
                        <th class='Unit'><?php echo Yii::t('app', 'Unit'); ?></th>

                        <th class='Qty'><?php echo Yii::t('app', 'Qty.'); ?></th>
                        <th class='Price'><?php echo Yii::t('app', 'Price'); ?></th>
                        <th class='Currency'><?php echo Yii::t('app', 'Currency'); ?></th>
                        <th class='VAT'><?php echo Yii::t('app', 'VAT'); ?></th>
                        <th class='Total'><?php echo Yii::t('app', 'Total'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;


                    foreach ($model->docDetailes as $docdetail) {
                        //print_r($docdetail);
                        //echo $this->renderPartial('docdetialview', array('model'=>$docdetail,)); 

                        if ($docdetail->description == '')
                            $class = 'class="newLine"';
                        else
                            $class = '';

                        echo "
                <tr $class>
                    <!--<td class='line'>$docdetail->line</td>
                    <td class='Itemid'>$docdetail->item_id</td>-->
                    <td class='Name'>$docdetail->name</td>
                    <td class='UntPrice'>$docdetail->iItem</td>
                    <td class='Unit'>" . $docdetail->ItemUnit->name . "</td>
                        
                    <td class='Qty'>$docdetail->qty</td>    
                    <td class='Price'>" . $docdetail->qty * $docdetail->iItem . "</td>
                    <td class='Currency'>$docdetail->currency_id</td>
                    <td class='VAT'>" . round($docdetail->iTotalVat  - $docdetail->iTotal,2) . "</td>
                    <td class='Total'>$docdetail->iTotal</td>
                    
                 </tr>
                 

                ";
                        ///*
                        if ($docdetail->description != '')
                            echo "<tr class='newLine'>
                    <!--<td class='line'></td>
                    <td class='Itemid'></td>-->
                    <td colspan='5'><span class='bold'>" . Yii::t('app', 'Description') . ":</span> $docdetail->description</td>
                    <td class='Currency'>  </td>
                    <td class='VAT'>  </td>
                    <td class='Total'>  </td>
                </tr>
                "; //*/
                        $i++;
                    }
                    /**/
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <!--<td class='line clear'></td>
                        <td class='Itemid clear'></td>-->
                        <td class='Name clear'></td>

                        <td class='UntPrice clear'></td>
                        <td class='Unit clear'></td>
                        <td class='Qty clear'></td>    
                        <td class='Price clear'></td>
                        <td  colspan='2' class='Qty clear'><?php echo Yii::t('labels', 'Discount'); ?></td>
                        <td class='Total'><?php echo (($model->disType) ? "%" : "") . $model->discount; ?></td>

                    </tr>
                    
                    
                    <tr>
                        <!--<td class='line clear'></td>
                        <td class='Itemid clear'></td>-->
                        <td class='Name clear'></td>

                        <td class='UntPrice clear'></td>
                        <td class='Unit clear'></td>
                        <td class='Qty clear'></td>    
                        <td class='Price clear'></td>
                        <td  colspan='2' class='Qty clear'><?php echo Yii::t('app', 'Subtotal tax excluded'); ?></td>
                        <td class='Total'><?php echo $model->sub_total; ?></td>

                    </tr>
                    <tr>
                        <!--<td class='line clear'></td>
                        <td class='Itemid clear'></td>-->
                        <td class='Name clear'></td>

                        <td class='UntPrice clear'></td>
                        <td class='Unit clear'></td>
                        <td class='Qty clear'></td>    
                        <td class='Price clear'></td>
                        <td  colspan='2' class='Qty clear'><?php echo Yii::t('app', 'Subtotal VAT'); ?></td>
                        <td class='Total'><?php echo $model->vat; ?></td>

                    </tr>
                    <tr>
                        <!--<td class='line clear'></td>
                        <td class='Itemid clear'></td>-->
                        <td class='Name clear'></td>

                        <td class='UntPrice clear'></td>
                        <td class='Unit clear'></td>
                        <td class='Qty clear'></td>    
                        <td class='Price clear'></td>
                        <td  colspan='2' class='Qty clear'><?php echo Yii::t('app', 'Subtotal tax exempt'); ?></td>
                        <td class='Total'><?php echo $model->novat_total; ?></td>

                    </tr>
                    
                    <tr>
                        <!--<td class='line clear'></td>
                        <td class='Itemid clear'></td>-->
                        <td class='Name clear'></td>

                        <td class='UntPrice clear'></td>
                        <td class='Unit clear'></td>
                        <td class='Qty clear'></td>    
                        <td class='Price clear'></td>
                        <td  colspan='2' class='Qty clear'><?php echo Yii::t('labels', 'Subtotal to pay'); ?></td>
                        <td class='Total'><?php echo $model->total; ?></td>

                    </tr>	
                </tfoot>
            </table>

            <?php
        }

//echo count($model->docCheques);
        /*         * *************************************************************************************************************************** */
        if (count($model->docCheques) != 0) {
            ?>


            <table class="printtbl table">
                <thead>
                    <tr>
                        <th class='Line'><?php echo Yii::t('labels', 'Line'); ?></th> 
                        <th class='Type'><?php echo Yii::t('labels', 'Type'); ?></th>   

                        <th class='Details'><?php echo Yii::t('labels', 'Details'); ?></th>

                        <th class='Currency'><?php echo Yii::t('labels', 'Currency'); ?></th>
                        <th class='Sum'><?php echo Yii::t('labels', 'Sum'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;


                    foreach ($model->docCheques as $rcptdetail) {

                        echo "
                <tr class='newLine'>
                    <td class='Line'>$rcptdetail->line</td>
                    <td class='Type'>" . Yii::t("app", $rcptdetail->Type->name) . "</td>
                    <td class='Detailes'>" . $rcptdetail->printDetails() . "</td>
                    <td class='Currency'>$rcptdetail->currency_id</td>
                    <td class='Sum'>$rcptdetail->sum</td>
                 </tr>

                ";
                        $i++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>

                        <td class="clear"></td>
                        <td class="clear"></td>
                        <td class="clear"></td>
                        <td class="clear"><?php echo Yii::t('labels', 'Total Received'); ?></td>
                        <td><?php echo $model->total; ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php
        /*         * *************************************************************************************************************************** */
    }
    ?>


    <div class="comments">
        <?php echo Yii::t('app', 'Comments'); ?>: <?php echo $model->description; ?>
    </div>


</div>



<?php
//$this->endWidget(); 
?>
<script type="text/javascript">
    window.onload = function() {
        preview =<?php echo $preview; ?>;

        if (preview == 0) {
            window.print();
            window.location = "<?php echo Yii::app()->CreateURL('docs/view/'.$model->id) ?>"
            //return url
        }
    };

</script>