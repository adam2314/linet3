<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
use \app\helpers\Linet3Helper;
use yii\helpers\Html;
use app\assets\PrintAsset;



$legalize = "";


if(!\app\helpers\Linet3Helper::isConsole()){
    PrintAsset::register($this);
    $base=yii\helpers\BaseUrl::base();
    
}else {   //console
    $base='';


}
//end if

if ($model->preview == 2) {
    
    
    
    
    
    $legalize = '<img src="' . $base. ('assets/img/sign.png') . '" alt="sign" />';//Yii::t('app', 'Computerized Document');
}
//app\widgets\MiniForm::begin(array('header' => Yii::t("app","View Document ") ." " .$model->id,));
?>
<div class="body">
    <div class="docHead">
        <div class="fromBox">
            <h3><?= Linet3Helper::getSetting('company.name'); ?></h3><br />
            <?= Linet3Helper::getSetting('company.address'); ?>, <?= Linet3Helper::getSetting('company.city'); ?> ,<?= Linet3Helper::getSetting('company.zip'); ?><br />
            <?= Yii::t('app', 'Phone'); ?>: <?= Linet3Helper::getSetting('company.phone'); ?><br />
            <?= Yii::t('app', 'Fax'); ?>: <?= Linet3Helper::getSetting('company.fax'); ?><br />
            <?= Linet3Helper::getSetting('company.website'); ?><br />

            <?= Yii::t('app', 'VAT No.'); ?>: <?= Linet3Helper::getSetting('company.vat.id'); ?><br />
        </div>


        <div  class="logo">
            <?php
            if(Linet3Helper::hasLogo()){
                echo yii\helpers\Html::img(Linet3Helper::getLogo(),['class'=>'logo']);
            }
            ?>
        </div>
    </div>

    <hr class="lineHR" />
    <div class="toBox">
        <table>	
            <tr>
                <td><?= Yii::t('app', 'To'); ?>:</td>
                <td><?= $model->company; ?></td>

            </tr>

            <tr>
                <td></td>
                <td><?= $model->address; ?></td>

            </tr>
            <tr>
                <td></td>
                <td><?= $model->city; ?> <?= $model->zip; ?></td>

            </tr>
            <tr>
                <td></td>
                <td><?= Yii::t('app', 'VAT No.'); ?>:<?= $model->vatnum; ?></td>

            </tr>

        </table>

    </div>


    <div class="toDate">
        <table>	
            <?php
            if (($model->docType->issue_label())) {
                ?>
                <tr>

                    <td><?= Html::encode($model->docType->issue_label()); ?>:</td>
                    <td>
                        <?= Html::encode($model->readDateFormat($model->issue_date)); ?>
                    </td>
                </tr> 
                <?php
            }
            ?>
            <?php
            if (($model->docType->due_label())) {
                ?>
                <tr>

                    <td><?= Html::encode($model->docType->due_label()); ?>:</td>
                    <td>
                        <?= Html::encode($model->readDateFormat($model->due_date)); ?>
                    </td>
                </tr> 
                <?php
            }
            ?>
            
            <?php
            if (($model->docType->ref_label())) {
                ?>
                <tr>

                    <td><?= Html::encode($model->docType->ref_label()); ?>:</td>
                    <td>
                        <?= Html::encode($model->readDateFormat($model->ref_date)); ?>
                    </td>
                </tr> 
                <?php
            }
            ?>
           
            <?php
            if ($model->refnum_ext!='') {
                ?>
                <tr>

                    <td><?= Yii::t('app', 'External Reference'); ?>:</td>
                    <td>
                        <?php echo $model->refnum_ext; ?>
                    </td>
                </tr> 
                <?php
            }
            ?>    

        </table>

    </div>
    <div class="legalize"><?= $legalize ?></div>
    <div class="docTitle"><h1><?= Yii::t('app', $model->docType->name); ?> <span style="font-size:25px;"> <?= Yii::t('app', 'No.'); ?> <?= $model->docnum; ?> </span>
            <span id='stamp'> 
                <?php
                if ($model->docType->copy) {
                    if ($model->docStatus->num != 2) {
                        echo $model->docStatus->name;
                    } else {
                        echo ($model->printed == 1) ? Yii::t('app', 'Source') : Yii::t('app', 'Copy');
                    }
                }
                ?>
            </span>           
        </h1>
    </div>
    <div>

    </div>
    

        <?php
        /*         * *************************************************************************************************************************** */

        if (count($model->docDetailes) != 0) {//
            ?>

            <table class="printtbl table">
                <thead>
                    <tr>
                        <!--<th class='line'><?= Yii::t('app', 'Line'); ?></th>
                        <th class='Itemid'><?= Yii::t('app', 'Item id'); ?></th>-->
                        <th class='Name'><?= Yii::t('app', 'Name'); ?></th>
                        <th class='UntPrice'><?= Yii::t('app', 'Unt. Price'); ?></th>
                        <th class='Unit'><?= Yii::t('app', 'Unit'); ?></th>

                        <th class='Qty'><?= Yii::t('app', 'Qty.'); ?></th>
                        <th class='Price'><?= Yii::t('app', 'Price'); ?></th>
                        <th class='Currency'><?= Yii::t('app', 'Currency'); ?></th>
                        <th class='VAT'><?= Yii::t('app', 'VAT'); ?></th>
                        <th class='Total'><?= Yii::t('app', 'Total'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;


                    foreach ($model->docDetailes as $docdetail) {
                        //print_r($docdetail);
                        //echo $this->render('docdetialview', array('model'=>$docdetail,)); 

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
                    <td class='Unit'>" . $docdetail->itemUnit->name . "</td>
                        
                    <td class='Qty'>$docdetail->qty</td>    
                    <td class='Price'>" . $docdetail->qty * $docdetail->iItem . "</td>
                    <td class='Currency'>$docdetail->currency_id</td>
                    <td class='VAT'>" . round($docdetail->iTotalVat  - $docdetail->iTotal,2) . "</td>
                    <td class='Total'>$docdetail->iTotalVat</td>
                    
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
                        <td  colspan='2' class='Qty clear'><?= Yii::t('app', 'Discount'); ?></td>
                        <td class='Total'><?= (($model->disType) ? "%" : "") . $model->discount; ?></td>

                    </tr>
                    
                    
                    <tr>
                        <!--<td class='line clear'></td>
                        <td class='Itemid clear'></td>-->
                        <td class='Name clear'></td>

                        <td class='UntPrice clear'></td>
                        <td class='Unit clear'></td>
                        <td class='Qty clear'></td>    
                        <td class='Price clear'></td>
                        <td  colspan='2' class='Qty clear'><?= Yii::t('app', 'Subtotal tax excluded'); ?></td>
                        <td class='Total'><?= $model->sub_total; ?></td>

                    </tr>
                    <tr>
                        <!--<td class='line clear'></td>
                        <td class='Itemid clear'></td>-->
                        <td class='Name clear'></td>

                        <td class='UntPrice clear'></td>
                        <td class='Unit clear'></td>
                        <td class='Qty clear'></td>    
                        <td class='Price clear'></td>
                        <td  colspan='2' class='Qty clear'><?= Yii::t('app', 'Subtotal VAT'); ?></td>
                        <td class='Total'><?= $model->vat; ?></td>

                    </tr>
                    <tr>
                        <!--<td class='line clear'></td>
                        <td class='Itemid clear'></td>-->
                        <td class='Name clear'></td>

                        <td class='UntPrice clear'></td>
                        <td class='Unit clear'></td>
                        <td class='Qty clear'></td>    
                        <td class='Price clear'></td>
                        <td  colspan='2' class='Qty clear'><?= Yii::t('app', 'Subtotal tax exempt'); ?></td>
                        <td class='Total'><?= $model->novat_total; ?></td>

                    </tr>
                    
                    <tr>
                        <!--<td class='line clear'></td>
                        <td class='Itemid clear'></td>-->
                        <td class='Name clear'></td>

                        <td class='UntPrice clear'></td>
                        <td class='Unit clear'></td>
                        <td class='Qty clear'></td>    
                        <td class='Price clear'></td>
                        <td  colspan='2' class='Qty clear'><?= Yii::t('app', 'Subtotal to pay'); ?></td>
                        <td class='Total'><?= $model->total; ?></td>

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
                        <th class='Line'><?= Yii::t('app', 'Line'); ?></th> 
                        <th class='Type'><?= Yii::t('app', 'Type'); ?></th>   

                        <th class='Details'><?= Yii::t('app', 'Details'); ?></th>

                        <th class='Currency'><?= Yii::t('app', 'Currency'); ?></th>
                        <th class='Sum'><?= Yii::t('app', 'Sum'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;


                    foreach ($model->docCheques as $rcptdetail) {

                        echo "
                <tr class='newLine'>
                    <td class='Line'>$rcptdetail->line</td>
                    <td class='Type'>" . Yii::t("app", $rcptdetail->typeo->name) . "</td>
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
                        <td class="clear"><?= Yii::t('app', 'Total Received'); ?></td>
                        <td><?= $model->total; ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php
        /*         * *************************************************************************************************************************** */
    }
    ?>


    <div class="comments">
        <?= Yii::t('app', 'Comments'); ?>: <?= $model->description; ?>
    </div>


</div>



<?php
//app\widgets\MiniForm::end(); 
?>
<script type="text/javascript">
    window.onload = function() {
        preview =<?= $model->preview; ?>;
        //console.log(preview);
        
        if (preview == 0) {
            window.print();
            window.location = "<?php echo $base.('/docs/view/'.$model->id) ?>"
            //return url
        }
    };

</script>
