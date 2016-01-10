<?php
/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

use \yii\helpers\Html;
use \yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use app\models\Language;
//use kartik\markdown\MarkdownEditor;
$form = kartik\form\ActiveForm::begin(array(
            'id' => 'docs-form',
            'enableAjaxValidation' => false,
            'enableClientValidation'=>false,
            'validateOnSubmit'=>false,
            'options' => array('enctype' => 'multipart/form-data'),
        ));


$docstatus = ArrayHelper::map(\app\models\Docstatus::find()->where(['doc_type' => $model->doctype])->all(), 'num', 'name');
$currncies = ArrayHelper::map(\app\models\Currates::GetRateList(), 'currency_id', 'name');
$accounts = ArrayHelper::map(\app\models\Accounts::findAllByType($model->docType->account_type), 'id', 'name');
if($model->doctype==6){
    $accounts1 = ArrayHelper::map(\app\models\Accounts::findAllByType(9), 'id', 'name');
    $accounts+=$accounts1;
}
$accounts[0] = Yii::t('app', 'None');
$oppts = ArrayHelper::map(\app\models\Accounts::findAllByType($model->docType->oppt_account_type), 'id', 'name');


$oppts[""] = Yii::t('app', 'None');
//echo $form->dropDownList($model, "[$i]item_id", $oppts);

$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" .
        "var oppt_account_type=" . (int) $model->docType->oppt_account_type . ";"
        , \yii\web\View::POS_HEAD);
$this->registerJsFile(yii\helpers\BaseUrl::base() . '/assets/docs.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="form">
        <!-- <p class="note">Fields with <span class="required">*</span> are required.</p>-->

    <?= $form->errorSummary($model); ?>
    <?= $form->field($model, "doctype", ['template' => '{input}'])->hiddenInput(); ?>
    <?= Html::hiddenInput("subType", "calc", ['id' => 'subType']); ?>
    <?= Html::hiddenInput("cur_rate", "1", ['id' => 'cur_rate']); ?>
    <?= Html::hiddenInput("doc_rate", "1", ['id' => 'doc_rate']); ?>
    <?= Html::hiddenInput("doc_items", count($model->docDetailes)+count($model->docDetArray), ['id' => 'doc_items']); ?>
    <?= Html::hiddenInput("rcpt_items", count($model->docCheques)+count($model->docCheqArray), ['id' => 'rcpt_items']); ?>
    <div><!--Company block-->
        <div class="col-md-2">
            <p>
                <label><?= Yii::t('app', 'Account'); ?></label>       
                <?=
                \app\widgets\Popover::widget([
                    'label' => \Yii::t('app', 'New Account'),
                    'id' => 'acc',
                    'ajax' => '/accounts/create/'.$model->docType->account_type,
                    "selctor" => "#accounts-form".$model->docType->account_type
                ]);
                ?>
                <?= $form->field($model, 'account_id', ['template' => '{input}'])->widget(Select2::classname(), ['data' => $accounts]); ?>         
                <?php
                //yii\bootstrap\Button::widget([
                //'label' => Yii::t('app', 'New'),
                //'icon' => 'glyphicon glyphicon-file',
                //'url' => yii\helpers\BaseUrl::base().('/accounts/create', array('type' => $model->docType->account_type)),
                //]); //*/
                ?>
            </p>
        </div>
        <div class="col-md-2">
            <div>
                <?= $form->field($model, 'oppt_account_id')->widget(Select2::classname(), ['data' => $oppts]); ?>      
                <?php //echo $form->dropDownListRow($model, '', );   ?>
                <p></p>
            </div>
        </div>   
        <div class="col-md-2">
            <?= $form->field($model, 'company'); ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'vatnum'); ?>
        </div>

    </div><!--block-->
    <div class="row"><!--Address block-->
        <div class="col-md-2">
            <?= $form->field($model, 'address'); ?>
        </div>

        <div class="col-md-1">
            <?= $form->field($model, 'city'); ?>
        </div>

        <div class="col-md-1">
            <?= $form->field($model, 'zip'); ?>
        </div>

        <div class="col-md-2">
            
        <?php
        if ($model->docType->ref_label()) {
            echo $form->field($model, 'ref_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date', 'disabled' => ((int) $model->docType->refLock),]);
        } else {
            echo $form->field($model, "ref_date", ['template' => '{input}'])->hiddenInput();
        }
        ?>

        </div>


    </div><!--block-->
    <div class="row"><!--Doc block-->

<!--
        <div class="col-md-1">
            <?php //$form->field($model, 'status')->widget(Select2::classname(), ['data' => $docstatus]); ?>      
        </div>    
-->
        <div class="col-md-2">
            <?= $form->field($model, 'currency_id')->widget(Select2::classname(), ['data' => $currncies]); ?>      
        </div>

        <div class="col-md-2">

            <?= \app\widgets\Refnum::widget(['model' => $model, 'attribute' => 'refnum']); ?>

        </div>
        <div class="col-md-2">

            <?= $form->field($model, 'refnum_ext'); ?>
        </div>

        <div class="col-md-2">
            <?php
            if ($model->docType->stockSwitch) {
                echo $form->field($model, 'stockSwitch')->checkbox();
            }
            ?>
        </div>



<!--
        <div class="col-md-2">
            <?php //\app\widgets\AttachedFiles::widget(['model' => $model, 'attribute' => 'Files']); ?>


        </div>
-->
        <div><!--date block-->
            <div class="col-md-2"><?php
        if ($model->docType->issue_label()) {
            echo $form->field($model, 'issue_date')->widget(DateControl::classname(), ['type' => 'date', 'disabled' => ((int) $model->docType->issueLock),]);
        } else {
            echo $form->field($model, "issue_date", ['template' => '{input}'])->hiddenInput();
        }
        ?></div>

            <div class="col-md-2"><?php
        if ($model->docType->due_label()) {
            echo $form->field($model, 'due_date')->widget(DateControl::classname(), ['type' => 'date', 'disabled' => ((int) $model->docType->dueLock),]);
        } else {
            echo $form->field($model, "due_date", ['template' => '{input}'])->hiddenInput();
        }
        ?></div>
        </div>
    </div>
    <br />

    <?php
    if ($model->docType->isdoc) {
        ?>

        <table  data-role="table" class="formtable" ><!-- docdetalies -->

            <!--<div class="row">-->
            <thead>
                <tr  class="head1">
                    <?php //echo $form->labelEx($model,'doc_id');       ?>
                    <th class="item_id">
                        <?= Yii::t('app', 'Item'); ?>
                        <?=
                        \app\widgets\Popover::widget([
                            'label' => \Yii::t('app', 'New Item'),
                            'id' => 'itm',
                            'ajax' => '/item/create',
                            "selctor" => "#item-form"
                        ]);
                        ?>



                    </th>
                    <th class="name"><?= Yii::t('app', 'Name'); ?></th>
                    <!--<th class="item_id"><?= Yii::t('app', 'Description'); ?></th>-->
                    <th class="qty"><?= Yii::t('app', 'Qty'); ?></th>
                    <th class="unit_id"><?= Yii::t('app', 'Unit id'); ?></th>
                    <th class="unit_price"><?= Yii::t('app', 'Unit Price'); ?></th>
                    <th class="currency_id"><?= Yii::t('app', 'Currency'); ?></th>
                    <th class="price"><?= Yii::t('app', 'Price'); ?></th>
                    <!--<th class="invprice"><?= Yii::t('app', 'Invprice'); ?></th>-->
                    <th class="vat"><?= Yii::t('app', 'VAT included'); ?></th>
                    <th class="actions"><?= Yii::t('app', 'Action'); ?></th>
                </tr>
            </thead>	
            <tfoot>
                <tr>
                    <td>
                        <textarea id="doc" style='display:none;'>       
                            <?php
                            echo $this->render('docdetial', array('model' => new \app\models\Docdetails, 'form' => $form, 'i' => 'ABC'));
                            ?>
                        </textarea>      
                    </td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?= $form->field($model, 'discount', ['template' => '{label}']); ?>
                        <?php ////echo $form->field($model,'sub_total',array('size'=>8,'maxlength'=>8));       ?>
                        <?= $form->field($model, 'discount', ['template' => '{error}']); ?>

                    </td>
                    <td>

                    </td>
                    <td>
                        <?= $form->field($model, 'discount'); ?>
                        <?php
                        //echo "<label>" . Yii::t('app', "in percentage") . "</label>" .
                        //$form->checkBox($model, "disType", '', array('value' => 1, 'uncheckValue' => 0));
                        ?>
                    </td>
                    <td class="docadd">
                        <?= Html::a(Yii::t('app', 'Add'), null, ['class' => 'btn btn-success']) ?>
                    </td>
                </tr>

                <tr>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <label><?= Yii::t('app', 'Subtotal tax excluded'); ?></label>
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));        ?>
                        <?= $form->field($model, 'sub_total', ['template' => '{error}']); ?>
                    </td>
                    <td>
                        <div id="docsub_total"></div>
                        <?= $form->field($model, 'sub_total', ['template' => '{input}'])->hiddenInput(); ?>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <label><?= Yii::t('app', 'Subtotal VAT'); ?></label>
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));         ?>
                        <?php //echo $form->error($model, 'sub_total');          ?>
                    </td>
                    <td>
                        <div id="docvat"></div>
                        <?= $form->field($model, 'vat', ['template' => '{input}'])->hiddenInput(); ?>
                    </td>
                    <td></td>
                </tr>



                <tr>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <label><?= Yii::t('app', 'Subtotal tax exempt'); ?></label>
                        <?= $form->field($model, 'novat_total', ['template' => '{error}']); ?>
                    </td>
                    <td>

                        <div id="docnovat_total"></div>
                        <?= $form->field($model, 'novat_total', ['template' => '{input}'])->hiddenInput(); ?>
                    </td>
                </tr>

                <tr>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?= $form->field($model, 'total', ['template' => '{label}']); ?>
                        <?= $form->field($model, 'total', ['template' => '{error}']); ?>
                    </td>
                    <td>
                        <div id="doctotal"></div>
                        <?= $form->field($model, 'total', ['template' => '{input}'])->hiddenInput(); ?>
                    </td>
                </tr>

            </tfoot>	

            <tbody class="docTarget">

                <?php
                $i = 0;
                if (count($model->docDetailes) != 0)
                    foreach ($model->docDetailes as $docdetail) {
                        echo $this->render('docdetial', array('model' => $docdetail, 'form' => $form, 'i' => "{$i}"));
                        $i++;
                    }
                    
                if (count($model->docDetArray) != 0)
                    foreach ($model->docDetArray as $docdetail) {
                        echo $this->render('docdetial', array('model' => $docdetail, 'form' => $form, 'i' => "{$i}"));
                        $i++;
                    }    
                    
                    
                ?>
            </tbody>


        </table><!-- doc detiales -->


    <?php } ?>


    <?php
    if ($model->docType->isrecipet) {
        ?>

        <table  data-role="table" class="formtable" ><!-- docrecipet -->


            <thead>
                <tr  class="head1">
                    <th class="type"><?= Yii::t('app', 'Type'); ?></th>   

                    <th class="details"><?= Yii::t('app', 'Details'); ?></th>

                    <th class="currency_id"><?= Yii::t('app', 'Currency'); ?></th>
                    <th class="sum"><?= Yii::t('app', 'Sum'); ?></th>


                    <th class="actions"><?= Yii::t('app', 'Action'); ?></th>
                </tr>
            </thead>	
            <tfoot>
                <tr>
                    <td colspan='2'>
                        <textarea id="rcpt" style='display:none;'>       
                            <?php
                            echo $this->render('rcptdetial', array('model' => new \app\models\Doccheques, 'form' => $form, 'i' => 'ABC'));
                            ?>
                        </textarea>      
                    </td>
                    <td>
                        <?php //echo $form->labelEx($model, 'src_tax');     ?>
                        <?php //echo $form->error($model, 'src_tax');        ?>
                    </td>

                    <td>
                        <?php //echo $form->textField($model, 'src_tax', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;"));        ?>
                    </td>
                    <td></td>
                    <td class="rcptadd">
                        <?= Html::a(Yii::t('app', 'Add'), null, ['class' => 'btn btn-success']) ?>


                    </td>
                </tr>
                <tr>
                    <td colspan='2'>

                    </td>
                    <td>
                        <?= $form->field($model, 'sub_total', ['template' => '{label}']); ?>
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));        ?>
                        <?= $form->field($model, 'sub_total', ['template' => '{error}']); ?>
                    </td>

                    <td>
                        <div id="rcptSum"></div>
                        <?= $form->field($model, "rcptsum", ['template' => '{input}'])->hiddenInput(); ?>    
                    </td>
                </tr>
            </tfoot>	

            <tbody class="rcptTarget">

                <?php
                $i = 0;
                if (count($model->docCheques) != 0)
                    foreach ($model->docCheques as $rcptdetail) {
                        echo $this->render('rcptdetial', array('model' => $rcptdetail, 'form' => $form, 'i' => "{$i}"));
                        $i++;
                    }
                ?>
            </tbody>




        </table><!-- doc recipet -->

    <?php } ?>
    <?php
    if ($model->docType->iscontract) {
        echo 'contract';
    }
    ?>

    <!--</div>-->

        <p>
        <?= $form->field($model, 'description')->textArea(); ?>
    </p>

    <p>
        <?= $form->field($model, 'comments')->textArea(); ?>

    <div class="btn-group">
        <!--</div>
        
        <div class="row buttons">-->
        <?= \yii\helpers\Html::dropDownList('language', Yii::$app->language, \yii\helpers\ArrayHelper::map(Language::find()->All(), 'id', 'name'),['id'=>'langSel']);   ?>
        <?php
        if (($model->doctype != 13) && ($model->doctype != 14)) {


            echo \yii\bootstrap\ButtonGroup::widget([
                'options' => ['class' => 'btn-group dropup'],
                'buttons' => [
                    \yii\bootstrap\ButtonDropdown::widget([
                        'options' => ['class' => 'btn-success'],
                        //'icon' => 'glyphicon glyphicon-print',
                        'label' =>  Yii::t('app', 'Make'),
                        'dropdown' => [
                            'items' => array(
                                "<li>" . \yii\helpers\Html::a( Yii::t('app', 'Print'),'javascript:sendForm("print");') . "</li>",
                                //'icon' => 'glyphicon glyphicon-cloud-upload',
                                "<li>" . \yii\helpers\Html::a( Yii::t('app', 'Email'),'javascript:sendForm("email");') . "</li>",
                                //'icon' => 'glyphicon glyphicon-envelope',
                                "<li>" . \yii\helpers\Html::a( Yii::t('app', 'PDF'),'javascript:sendForm("pdf");') . "</li>",
                                //'icon' => 'glyphicon glyphicon-save',
                                "<li>" . \yii\helpers\Html::a( Yii::t('app', 'Save Draft'),'javascript:sendForm("saveDraft");') . "</li>",
                                //'icon' => 'glyphicon glyphicon-cloud-upload',
                            )
                        ]
                    ]),
					\yii\bootstrap\Button::widget([
                        'options' => ['class' => 'btn-success'],
                        'label' => Yii::t('app', 'Preview'),
                        'clientEvents' => ['click' => 'function(event){sendForm("preview");}'],
                            //'icon' => 'glyphicon glyphicon-file',
                            //'url' => 'return sendForm("preview");',
                    ]),
                    
                    /*
                    \yii\bootstrap\Button::widget([
                        'options' => ['class' => 'btn-success'],
                        'label' => Yii::t('app', 'Print'),
                        'clientEvents' => ['click' => 'function(event){sendForm("print");}'],
                        //'url' => 'return sendForm("preview");',
                    ]),*/
                    
                    \yii\bootstrap\Button::widget([
                        'options' => ['class' => 'btn-success'],
                        'label' => Yii::t('app', 'Change language'),
                        'clientEvents' => ['click' => "function(event){event.preventDefault();\$(this).hide(150); $('#langSel').show(150);}"],
                        //'url' => 'return sendForm("preview");',
                    ]),
                ]
            ]);
        } else {

            echo \yii\bootstrap\Button::widget([
                'options' => ['class' => 'btn-success'],
                'label' => Yii::t('app', 'Save'),
                'clientEvents' => ['click' => 'function(event){sendForm("save");}'],
                    //'icon' => 'glyphicon glyphicon-file',
            ]);
        }
        ?>
        <!--</div>-->
    </div>


</div><!-- form -->
<?php kartik\form\ActiveForm::end(); ?>

<?= \app\widgets\RefnumModal::widget(['model' => $model, 'attribute' => 'refnum']); ?>

<?php  $this->registerJs("if($('[name=\"doc_items\"]').val()==0)
        $('.docadd').trigger('click');
if($('[name=\"rcpt_items\"]').val()==0)
$('.rcptadd').trigger('click');"// .
        //$java
        , \yii\web\View::POS_READY);
?>