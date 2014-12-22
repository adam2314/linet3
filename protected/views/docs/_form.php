<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'docs-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));


$oppts = CHtml::listData(Accounts::model()->findAllByType($model->docType->oppt_account_type), 'id', 'name');
$oppts[""] = Yii::t('app', 'None');
//echo $form->dropDownList($model, "[$i]item_id", $oppts);
?>
<div class="form" style="
     /*
     background-image:url('<?php echo Yii::app()->createAbsoluteUrl('/form.png'); ?>');
     background-repeat:no-repeat;
     background-size:100% 700px;*/
     ">
        <!-- <p class="note">Fields with <span class="required">*</span> are required.</p>-->

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model, "doctype"); ?>
    <?php echo CHTML::hiddenField("subType", "save"); ?>
    <?php echo CHTML::hiddenField("cur_rate", "1"); ?>
    <?php echo CHTML::hiddenField("doc_rate", "1"); ?>
    <?php echo CHTML::hiddenField("doc_items", count($model->docDetailes)); ?>
    <?php echo CHTML::hiddenField("rcpt_items", count($model->docCheques)); ?>
    <div><!--Company block-->
        <div class="col-md-2">
            <p>
                <?php //echo $form->labelEx($model, 'account_id');   ?>
                <?php echo $form->dropDownListRow($model, 'account_id', CHtml::listData(Accounts::model()->findAllByType($model->docType->account_type), 'id', 'name')); ?>
                <?php //echo $form->error($model, 'account_id');  ?>
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'label' => Yii::t('app', 'New'),
                    //'type'=>'primary',
                    'icon' => 'glyphicon glyphicon-file',
                    'url' => $this->createUrl('/accounts/create', array('type' => $model->docType->account_type)),
                        //'htmlOptions'=>array('id'=>'printLink', 'onclick'=>'return hideMe();'),
                ));
                ?>
            </p>
        </div>
        <div class="col-md-2">
            <div>
                <?php echo $form->dropDownListRow($model, 'oppt_account_id', $oppts); ?>
                <p></p>
            </div>
        </div>   
        <div class="col-md-2">
            <?php echo $form->textFieldRow($model, 'company', array('size' => 30, 'maxlength' => 80)); ?>
        </div>
        <div class="col-md-2">
            <?php echo $form->textFieldRow($model, 'vatnum', array('size' => 10, 'maxlength' => 10)); ?>
        </div>

    </div><!--block-->
    <div class="row"><!--Address block-->
        <div class="col-md-2">
            <?php echo $form->textFieldRow($model, 'address', array('size' => 30, 'maxlength' => 80)); ?>
        </div>

        <div class="col-md-1">
            <?php echo $form->textFieldRow($model, 'city', array('size' => 30, 'maxlength' => 40)); ?>
        </div>

        <div class="col-md-1">
            <?php echo $form->textFieldRow($model, 'zip', array('size' => 10, 'maxlength' => 10)); ?>
        </div>
        
        <div class="col-md-2">
                <?php echo $form->labelEx($model, 'ref_date'); ?>
                <?php
                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'ref_date', //attribute name
                    'mode' => 'datetime',
                    'language' => substr(Yii::app()->language, 0, 2),
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                    ) // jquery plugin options
                ));
                ?>
                <?php echo $form->error($model, 'ref_date'); ?>
            </div>


    </div><!--block-->
    <div class="row"><!--Doc block-->


        <div class="col-md-1">
            <?php echo $form->dropDownListRow($model, 'status', CHtml::listData(Docstatus::model()->findAllByAttributes(array('doc_type' => $model->doctype)), 'num', 'name')); //Docstatus::model()->findAll();   ?>
        </div>    

        <div class="col-md-2">
            <?php echo $form->dropDownListRow($model, 'currency_id', CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name')); //currency    ?>
        </div>

        <div class="col-md-1">

            <?php
///*
            $this->widget('widgetRefnum', array(
                'model' => $model, //Model object
                'attribute' => 'refnum', //attribute name
            )); //*/
            ?>

        </div>
        <div class="col-md-1">

            <?php echo $form->textFieldRow($model, 'refnum_ext'); ?>
        </div>

        <div class="col-md-1">
            <?php
            if ($model->docType->stockSwitch) {
                echo $form->checkBoxRow($model, 'stockSwitch');
            }
            ?>
        </div>




        <div class="col-md-2">
            <label><?php echo Yii::t('labels', 'Attached Files'); ?></label>

            <?php
            $this->widget('CMultiFileUpload', array(
                'name' => 'Files',
                'model' => $model,
                'id' => 'Files',
                'accept' => '*', // useful for verifying files
                'duplicate' => 'Duplicate file!', // useful, i think
                'denied' => 'Invalid file type', // useful, i think
            ));
            ?>
            <?php
            if (!$model->isNewRecord) {
                echo "<h2>" . Yii::t('app', 'Attached files') . "</h2>";
                $files = new Files('search');
                $files->unsetAttributes();
                $files->parent_type = get_class($model);
                $files->parent_id = $model->id;
                $this->widget('EExcelView', array(
                    'id' => 'acc-template-grid',
                    'dataProvider' => $files->search(),
                    //'filter'=>$model,
                    'template' => '{items}{pager}',
                    'ajaxUpdate' => true,
                    'columns' => array(
                        array(
                            'name' => 'name',
                            'type' => 'raw',
                            'value' => 'CHtml::link(CHtml::encode($data->name), Yii::app()->createUrl("download/".$data->id))',
                        ),
                        array(
                            'name' => 'date',
                            'value' => 'date("' . Yii::app()->locale->getDateFormat('phpdatetime') . '",CDateTimeParser::parse($data->date,"' . Yii::app()->locale->getDateFormat('yiidbdatetime') . '"))'
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{delete}',
                            'buttons' => array(
                                'delete' => array(
                                    'label' => '<i class="glyphicon glyphicon-trash"></i>',
                                    'deleteConfirmation' => true,
                                    'imageUrl' => false,
                                    'url' => 'Yii::app()->createUrl("files/delete", array("id"=>$data->id))',
                                ),
                            ),
                        ),
                    ),
                ));
            }
            ?>

        </div>
        <div><!--date block-->
            <div class="col-md-2">
                <?php echo $form->labelEx($model, 'issue_date'); ?>
                <?php
                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'issue_date', //attribute name
                    'mode' => 'datetime',
                    'language' => substr(Yii::app()->language, 0, 2),
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                    ) // jquery plugin options
                ));
                ?>
                <?php echo $form->error($model, 'issue_date'); ?>
            </div>

            <div class="col-md-2">
                <?php echo $form->labelEx($model, 'due_date'); ?>
                <?php
                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'due_date', //attribute name
                    'mode' => 'datetime',
                    'language' => substr(Yii::app()->language, 0, 2),
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                    ) // jquery plugin options
                ));
                ?>
                <?php echo $form->error($model, 'due_date'); ?>
            </div>
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
                    <?php //echo $form->labelEx($model,'doc_id');     ?>
                    <th class="item_id">
                        <?php echo Yii::t('labels', 'Item'); ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => Yii::t('app', 'New'),
                            //'type'=>'primary',
                            'icon' => 'glyphicon glyphicon-file',
                            'url' => $this->createUrl('/item/create'),
                                //'htmlOptions'=>array('id'=>'printLink', 'onclick'=>'return hideMe();'),
                        ));
                        ?>


                    </th>
                    <th class="name"><?php echo Yii::t('labels', 'Name'); ?></th>
                    <!--<th class="item_id"><?php echo Yii::t('labels', 'Description'); ?></th>-->
                    <th class="qty"><?php echo Yii::t('labels', 'Qty'); ?></th>
                    <th class="unit_id"><?php echo Yii::t('labels', 'Unit id'); ?></th>
                    <th class="unit_price"><?php echo Yii::t('labels', 'Unit Price'); ?></th>
                    <th class="currency_id"><?php echo Yii::t('labels', 'Currency'); ?></th>
                    <th class="price"><?php echo Yii::t('labels', 'Price'); ?></th>
                    <!--<th class="invprice"><?php echo Yii::t('labels', 'Invprice'); ?></th>-->
                    <th class="vat"><?php echo Yii::t('labels', 'VAT included'); ?></th>
                    <th class="actions"><?php echo Yii::t('labels', 'Action'); ?></th>
                </tr>
            </thead>	
            <tfoot>
                <tr>
                    <td>
                        <textarea id="doc" style='display:none;'>       
                            <?php
                            echo $this->renderPartial('docdetial', array('model' => new Docdetails, 'form' => $form, 'i' => 'ABC'));
                            ?>
                        </textarea>      
                    </td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php echo $form->labelEx($model, 'discount'); ?>
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));    ?>
                        <?php echo $form->error($model, 'discount'); ?>

                    </td>
                    <td>
                        <?php echo $form->textField($model, 'discount', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?>
                    </td>
                    <td><?php
                        echo "<label>" . Yii::t('app', "in percentage") . "</label>" .
                        $form->checkBox($model, "disType", '', array('value' => 1, 'uncheckValue' => 0));
                        ?>
                    </td>
                    <td class="docadd">
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => Yii::t('app', 'Add'),
                            'icon' => 'glyphicon glyphicon-plus',
                        ));
                        ?>
                    </td>
                </tr>

                <tr>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php echo $form->labelEx($model, 'sub_total'); ?>
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));     ?>
                        <?php echo $form->error($model, 'sub_total'); ?>
                    </td>
                    <td>
                        <div id="docsub_total"></div>
                        <?php echo $form->hiddenField($model, 'sub_total', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?>
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
                        <label><?php echo Yii::t('app', 'Subtotal VAT'); ?></label>
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));      ?>
                        <?php //echo $form->error($model, 'sub_total');    ?>
                    </td>
                    <td>
                        <div id="docvat"></div>
                        <?php echo $form->hiddenField($model, 'vat', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?>
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
                        <?php //echo $form->labelEx($model,'novat_total');      ?>
                        <?php //echo $form->error($model,'novat_total');       ?>
                    </td>
                    <td>
                        <?php echo $form->hiddenField($model, 'novat_total'); ?>
                    </td>
                </tr>

                <tr>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php echo $form->labelEx($model, 'total'); ?>
                        <?php echo $form->error($model, 'total'); ?>
                    </td>
                    <td>
                        <div id="doctotal"></div>
                        <?php echo $form->hiddenField($model, 'total', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?>
                    </td>
                </tr>

            </tfoot>	

            <tbody class="docTarget">

                <?php
                $i = 0;
                if (count($model->docDetailes) != 0)
                    foreach ($model->docDetailes as $docdetail) {
                        echo $this->renderPartial('docdetial', array('model' => $docdetail, 'form' => $form, 'i' => "{$i}"));
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
                    <th class="type"><?php echo Yii::t('labels', 'Type'); ?></th>   

                    <th class="details"><?php echo Yii::t('labels', 'Details'); ?></th>

                    <th class="currency_id"><?php echo Yii::t('labels', 'Currency'); ?></th>
                    <th class="sum"><?php echo Yii::t('labels', 'Sum'); ?></th>


                    <th class="actions"><?php echo Yii::t('labels', 'Action'); ?></th>
                </tr>
            </thead>	
            <tfoot>
                <tr>
                    <td colspan='2'>
                        <textarea id="rcpt" style='display:none;'>       
                            <?php
                            echo $this->renderPartial('rcptdetial', array('model' => new Doccheques, 'form' => $form, 'i' => 'ABC'));
                            ?>
                        </textarea>      
                    </td>
                    <td>
                        <?php //echo $form->labelEx($model, 'src_tax');  ?>
                        <?php //echo $form->error($model, 'src_tax');  ?>
                    </td>

                    <td>
                        <?php //echo $form->textField($model, 'src_tax', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;"));  ?>
                    </td>
                    <td></td>
                    <td class="rcptadd">
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => Yii::t('app', 'Add'),
                            'icon' => 'glyphicon glyphicon-plus',
                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>

                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'sub_total'); ?>
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));     ?>
                        <?php echo $form->error($model, 'sub_total'); ?>
                    </td>

                    <td>
                        <div id="rcptSum"></div>
                        <?php echo $form->hiddenField($model, "rcptsum"); ?>    
                    </td>
                </tr>
            </tfoot>	

            <tbody class="rcptTarget">

                <?php
                $i = 0;
                if (count($model->docCheques) != 0)
                    foreach ($model->docCheques as $rcptdetail) {
                        echo $this->renderPartial('rcptdetial', array('model' => $rcptdetail, 'form' => $form, 'i' => "{$i}"));
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




    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(//
        'id' => "paymenetDialog",
        'options' => array(
            'title' => Yii::t('app', 'Pay'),
            'autoOpen' => false,
            'width' => '600px',
        ),
    ));
    ?>
    <div id="paymenetForm"></div>    
    <div id="paymenetResult"></div>
    <?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');
    ?>
    <!--</div>-->
    <script type="text/javascript">


        var billed = [];


        $("#Docs_account_id").change(function() {
            var idate = $('#Docs_issue_date').val();
            $.get("<?php echo $this->createUrl('/'); ?>/index.php", {"r": "/accounts/JSON", "id": $("#Docs_account_id").val()},
            function(data) {
                $("#Docs_company").val(data.name);
                $("#Docs_address").val(data.address);
                $("#Docs_city").val(data.city);
                $("#Docs_zip").val(data.zip);
                $("#Docs_vatnum").val(data.vatnum);
                $("#Docs_currency_id").val(data.currency_id);
                $("#Docs_currency_id").trigger("liszt:updated");

                $("#Docs_vatnum").trigger("change");
                var pay_terms = data.pay_terms;
                //CalcDueDate(idate, pay_terms);
            }, "json")
                    .error(function() {
                    });
        });



        jQuery(document).ready(function() {

            $("#docs-form").submit(function() {
                var go = true;
                for (var i = 0; i < billed.length; i++) {
                    console.log("billed:" + i + "," + billed[i]);
                    if (!billed[i])
                        go = false;
                }
                if (go) {
                    return true;
                } else
                    return false;

                //else
                //    return rcptBill();
            });

            //hideEmptyHeaders();
            $(".docadd").click(function() {

                var template = $('#doc').val();

                //var i=$(".templateTarget tr").length;
                var i = $('#doc_items').val() * 1;
                template = template.replace(/ABC/g, i);
                //template    

                $('.docTarget').append(template);


                var textbox = $("#Docdetails_" + i + "_description");
                var textarea = $("<textarea style='width:100%' rows='1' name='Docdetails[" + i + "][description]' id='Docdetails_" + i + "_description'></textarea>");
                textarea.val(textbox.val());
                //Replace textbox with textarea
                textbox = textbox.replaceWith(textarea);



                $('#doc_items').val(i + 1);
                // start specific commands

                calcLines();
                // end specific commands
            });


            $(".rcptadd").click(function() {

                var template = $('#rcpt').val();

                //var i=$(".templateTarget tr").length;
                var i = $('#rcpt_items').val() * 1;
                template = template.replace(/ABC/g, i);


                $('.rcptTarget').append(template);
                $('#rcpt_items').val(i + 1);
                // start specific commands
                //$('#Doccheques_<?php echo $i; ?>_type').val(0);
                //$('#Doccheques_<?php echo $i; ?>_type').trigger("liszt:updated");

                rcptcalcLines();
                // end specific commands
            });


            $("#resizable").resizable();
            $('.docadd').trigger('click');
            $('.rcptadd').trigger('click');
            var elements = $('tr.filters > td > [name^=Docs]');
            for (var i = 0; i < elements.length; i++) {
                elements[i].name = elements[i].name.replace("Docs", "Docsfilter");
                //console.log(elements[i].name);

            }

            $('#language_chosen').hide();

            changeFileds();

        });
        /*******************end ready*****************************/

        function makeRcpt(i) {
            billed[i] = true;
            $('#docs-form').submit();

        }



        function sendBill(index) {

            var type = $('#Doccheques_' + index + '_type').val();

            var elements = $('[id^=Doccheques_' + index + ']');
            var str = '';
            for (var i = 0; i < elements.length; i++) {
                var name = elements[i].name + '';
                name = name.replace('Doccheques[' + index + ']', "bill");
                str += name + '=' + $(elements[i]).val() + '&';
            }
            console.log(str);
            $.post("<?php echo $this->createUrl('/payment/bill'); ?>/" + type, str,
                    function(data) {

                        off = false;
                        if (data.bill) {
                            billed[index] = true;
                            $("#bill_" + index + "_btn").remove();

                        }
                        $("#bill_" + index + "_resualt").html(data.code + "-" + data.text + "," + data.desc);

                        //console.log(data);
                        //alert(data);
                        //$('#paymenetDialog').dialog('open');
                        //show popup 

                        //$('#paymenetResult').html(data[1]);

                    }, "json");//

            //console.log(str);
        }



        function rcptBill() {


            var elements = $('[id^=Doccheques_][id$=_type]');
            var sums = $('[id^=Doccheques_][id$=_sum]');
            var off = false;
            for (var i = 0; i < elements.length; i++) {

                //billed[i] = false;
                console.log(elements[i].value);

                /*$.post("<?php echo $this->createUrl('/payment/form'); ?>/" + elements[i].value, {"bill": {"sum": $(sums[i]).val(), "line": [i]}}, //"bill"
                 function(data) {
                 //$("#paymenetDialog").show();
                 off = true;
                 //console.log(data);
                 if (!data[1]) {
                 billed[data[0]] = true;
                 
                 $('#docs-form').submit();
                 } else {
                 //   return true;
                 $('#paymenetDialog').dialog('open');
                 //show popup 
                 var tmp = "<input type='hidden' id='bill_line' value='" + i + "'/>";
                 $('#paymenetForm').html(tmp + data[1]);
                 }
                 }, "json");//*/
                //move values

                //save
            }
            return false;//off;
        }


        function changeFileds() {//
            var type = <?php echo (int) $model->docType->oppt_account_type; ?>;
            if (type >= 1) {
                //$("#Docs_company").prop('disabled', true);


                $("#Docs_status").parent().hide();
                $("#Docs_address").parent().hide();
                $("#Docs_city").parent().hide();
                $("#Docs_zip").parent().hide();

                //$("#Docs_vatnum").parent().hide();
                $("#Docs_zip").parent().hide();

                //$("#Docsrefnum").parent().hide();
                //$("#Docs_due_date").parent().hide();

                $('#Docs_discount').hide();

                //$('.formtable tr th:nth-child(3)').hide();
                //$('.formtable tr td:nth-child(3)').hide();

                //$('.formtable tr th:nth-child(7)').hide();
                //$('.formtable tr td:nth-child(7)').hide();

                //$('.formtable tr th:nth-child(9)').hide();
                //$('.formtable tr td:nth-child(9)').hide();
            } else {
                //$('#Docs_oppt_account_id').parent().hide();
                $('#Docs_ref_date').parent().remove();
                
                $('#Docs_oppt_account_id').parent().remove();
                $('#Docs_issue_date').attr("disabled",'disabled');
            }
        }

        function refNum(doc) {//


            $("#choseDocs_refnum").dialog("close");

            $('#Docs_refnum_div').html($('#Docs_refnum_div').html() + ", " + doc.doctype + " #" + doc.docnum);
            $('#Docs_refnum_ids').val($('#Docs_refnum_ids').val() + doc.id + ",");



            $('#Docs_account_id').val(doc.account_id);
            $("#Docs_account_id").trigger("liszt:updated");

            $("#Docs_company").val(doc.company);
            $("#Docs_address").val(doc.address);
            $("#Docs_city").val(doc.city);
            $("#Docs_zip").val(doc.zip);
            $("#Docs_vatnum").val(doc.vatnum);
            $("#Docs_currency_id").val(doc.currency_id);
            $("#Docs_currency_id").trigger("liszt:updated");


            if ($('#Doccheques_0_sum').val() == '') {
                $('#Doccheques_0_sum').val('0');
            }
            $('#Doccheques_0_sum').val(parseFloat($('#Doccheques_0_sum').val()) + parseFloat(doc.total));
            rcptSum();
            return false;


        }

        /*
         function nameChange(index) {
         var item_id = $('#Docdetails_'+index+'_name').val();
         $('#Docdetails_'+index+'_item_id').val(item_id);
         itemChange(index);      
         }*/

        function TypeSelChange(index) {
            var val = $('#Doccheques_' + index + '_type').val();
            var sum = $('#Doccheques_' + index + '_sum').val();
            var line = index;
            $('#Doccheques_' + index + '_text').html('');
            $.post("<?php echo $this->createUrl('/payment/fields'); ?>/" + val, {"bill": {"sum": sum, "line": line}}, //"bill"
            function(data) {

                billed[index] = !data.bill;
                var tmp = "<div id='bill_" + index + "_resualt'></div>";

                if (data.bill) {
                    tmp += "<a id='bill_" + index + "_btn' href='javascript:sendBill(" + index + ");' class='btn btn-primary'><?php echo Yii::t('app', 'Bill') ?></a>";
                }
                $('#Doccheques_' + index + '_text').html(data.form + tmp);



            }, "json");





        }


        /******************************************************docs calcs********************/

        function itemChange(index) {
            var part = $('#Docdetails_' + index + '_item_id').val();
            $.get("<?php echo $this->createUrl('/'); ?>/index.php", {"r": "item/JSON", "id": part},
            function(data) {

                $('#Docdetails_' + index + '_name').val(data.name);
                //$('#Docdetails_'+index+'_name').trigger("liszt:updated");
                $('#Docdetails_' + index + '_description').val(data.description);
                $('#Docdetails_' + index + '_ihItem').val(data.saleprice);
                $('#Docdetails_' + index + '_iItem').val(data.saleprice);
                $('#Docdetails_' + index + '_currency_id').val(data.currency_id);
                $('#Docdetails_' + index + '_currency_id').trigger("liszt:updated");
                $('#Docdetails_' + index + '_unit_id').val(data.unit_id);
                $('#Docdetails_' + index + '_unit_id').trigger("liszt:updated");
                //currChange(index);

                $('#Docdetails_' + index + '_rate').val("1");
                if ($('#Docdetails_' + index + '_qty').val() == 0) {
                    $('#Docdetails_' + index + '_qty').val("1");

                }

                CalcPrice(index);
                //$('#Docdetails_' + index + '_iVatRate').val(data.vat);

            }, "json")
                    .error(function() {
                    });
        }



        function calcLines() {//count doc lines
            var elements = $('.detail .line');

            for (var i = 0; i < elements.length; i++) {
                $('#' + elements[i].id).val(i + 1);
            }
        }

        function CalcPrice(index, hChange) {//.org
            if (hChange == 'CalcPriceWithVat')
                hChange = '&CalcPriceWithVat=1';
            else
            if (hChange == 'CalcPriceWithOutVat')
                hChange = '&CalcPriceWithOutVat=1';
            else
                hChange = '';
            var doc_rate = $("#doc_rate").val();
            var parms = '&Docdetails[' + index + '][doc_rate]=' + doc_rate + '&Docdetails[line]=' + index + hChange;
            var form = $('[id^=Docdetails_' + index + ']').serialize() + parms;

            $.post("<?php echo $this->createUrl('/'); ?>/docdetails/calc", form,
                    function(data) {
                        $.each(data.body, function(key, value) {
                            $('#Docdetails_' + index + '_' + key).val(value);
                        });

                        $('#Docdetails_' + index + '_iTotallabel').html(data.body.iTotal);
                        //if (calc === undefined) 
                        return CalcPriceSum();
                        //else
                        //    return data.body.iTotal;
                    }, "json")
                    .error(function(data) {
                        console.log(data);
                    });




        }



        function CalcPriceSum(org) {
            //$('#subType').val('calc');
            
            $.post("<?php echo $this->createUrl('/docs/calc'); ?>", $("#docs-form").serialize(),
                    function(data) {
                        $('#Docs_vat').val(data.body.vat).trigger('change');
                        $('#Docs_sub_total').val(data.body.sub_total).trigger('change');
                        $('#Docs_novat_total').val(data.body.novat_total);
                        $('#Docs_total').val(data.body.total).trigger('change');//novat_total
                        $('#Docs_rcptsum').val(data.body.rcptsum).trigger('change');
                    }, "json")
                    .error(function(data) {
                        console.log(data);
                    });


        }




        /**********************************Discount*****************************/
        $('#Docs_discount').blur(function() {
            total = $('#Docs_sub_total').val();
            discount = $('#Docs_discount').val();
            var iTotals = $('.detail.ihTotal');
            var sum = vatSum = novatSum = 0;

            for (var i = 0; i < iTotals.length; i++) {

                var iTotal = $('#Docdetails_' + i + '_iTotal').val();//get ihtotal with vat:)
                if ($('#Docs_disType').attr('checked')) {
                    iTotal = iTotal - ((iTotal / 100) * discount);
                } else {
                    iTotal = iTotal - ((iTotal / total) * discount);
                }

                $('#Docdetails_' + i + '_iTotal').val(iTotal);
                CalcPrice(i, "CalcPriceWithOutVat");
            }
        });

        /**********************************CurChange****************************/
        $('#Docs_currency_id').change(function() {
            var currency = $('#Docs_currency_id').val();

            $.get("<?php echo $this->createUrl('/'); ?>/index.php", {"r": "Currates/Getrate", "id": currency},
            function(data) {
                $('#doc_rate').val(data.body);
                var elements = $('.currSelect');
                for (var i = 0; i < elements.length; i++) {
                    index = elements[i].id.replace("Docdetails_", '').replace("_currency_id", '');
                    CalcPrice(index);
                }

            }, "json")
                    .error(function() {
                    });

        });

        $('#Docs_total').change(function() {
            $('#doctotal').html($('#Docs_total').val());
        });

        $('#Docs_sub_total').change(function() {
            $('#docsub_total').html($('#Docs_sub_total').val());
        });

        $('#Docs_vat').change(function() {
            $('#docvat').html($('#Docs_vat').val());
        });

        $('#Docs_rcptsum').change(function() {
            $('#rcptSum').html($('#Docs_rcptsum').val());
        });


        /**********************************doc end******************************/

        function rcptSum() {
            CalcPriceSum();
        }

        function rcptcalcLines() {
            var elements = $('.rcptline');
            //var i=1;

            for (var i = 0; i < elements.length; i++) {

                //console.log(elements[i].id);
                $('#' + elements[i].id).val(i + 1);
                //i++;
            }
        }

        function hideMe() {
            $('#printLink').hide(150);
            $('#language_chosen').show(150);
            return false;
        }




        function sendForm(value) {//preview,print,mail,pdf,save

            $('#subType').val(value);
            if (value == 'preview')
                $("#docs-form").attr('target', '_BLANK');




            /*
             if (($('#Docs_total').length) && ($('#Docs_rcptsum').length)) {
             if (Number($('#Docs_total').val()) != Number($('#Docs_rcptsum').val())) {
             alert("<?php echo Yii::t('app', 'Sum is not equal'); ?>");
             return false;
             }
             }*/


            rcptBill();



            $('#docs-form').submit();

            //}

        }





    </script>
    <p>
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php
        $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'description',
        ));
        ?>
        <?php echo $form->error($model, 'description'); ?>




    </p>

    <p>
        <?php echo $form->labelEx($model, 'comments'); ?>
        <?php
        $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'comments',
        ));
        ?>
        <?php echo $form->error($model, 'comments'); ?>
    </p>

    <div class="btn-group">
        <!--</div>
        
        <div class="row buttons">-->

        <?php
        if (($model->doctype != 13) && ($model->doctype != 14)) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('app', 'Preview'),
                'icon' => 'glyphicon glyphicon-file',
                'type' => 'primary',
                'htmlOptions' => array('onclick' => 'return sendForm("preview");',),
            ));

            $this->widget('bootstrap.widgets.TbButtonGroup', array(
                'type' => 'primary',
                'htmlOptions' => array('class' => 'dropup'),
                'buttons' => array(
                    array('icon' => 'glyphicon glyphicon-print', 'label' => Yii::t('app', 'Print'), 'htmlOptions' => array('onclick' => 'return sendForm("print");'),),
                    array('items' => array(
                            array('icon' => 'glyphicon glyphicon-envelope', 'label' => Yii::t('app', 'Email'), 'url' => 'javascript:sendForm("email");',),
                            array('icon' => 'glyphicon glyphicon-save', 'label' => Yii::t('app', 'PDF'), 'url' => 'javascript:sendForm("pdf");',),
                            array('icon' => 'glyphicon glyphicon-cloud-upload', 'label' => Yii::t('app', 'Save Draft'), 'url' => 'javascript:sendForm("saveDraft");',),
                        )),
                ),
            ));

            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('app', 'Change language'),
                'type' => 'primary',
                'icon' => 'glyphicon glyphicon-globe',
                'htmlOptions' => array('id' => 'printLink', 'onclick' => 'return hideMe();'),
            ));
        } else {
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('app', 'Save'),
                'icon' => 'glyphicon glyphicon-file',
                'type' => 'primary',
                'htmlOptions' => array('onclick' => 'return sendForm("save");',),
            ));
        }
        ?>
        <!--</div>-->
    </div>
    <?php echo CHtml::dropDownList('language', Yii::app()->user->language, CHtml::listData(Language::model()->findAll(), 'id', 'name')); ?>

</div><!-- form -->
<?php $this->endWidget(); ?>

