

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'docs-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
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
                <?php echo $form->labelEx($model, 'account_id'); ?>
                <?php echo $form->dropDownList($model, 'account_id', CHtml::listData(Accounts::model()->findAllByAttributes(array('type' => $model->docType->account_type)), 'id', 'name')); ?>
                <?php echo $form->error($model, 'account_id'); ?>
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
                <?php echo $form->labelEx($model, 'oppt_account_id'); ?>
                <?php echo $form->dropDownList($model, 'oppt_account_id', CHtml::listData(Accounts::model()->findAllByAttributes(array('type' => $model->docType->oppt_account_type)), 'id', 'name')); ?>
                <p></p>
                <?php echo $form->error($model, 'oppt_account_id'); ?>
            </div>
        </div>   
        <div class="col-md-2">
            <p>
                <?php echo $form->labelEx($model, 'company'); ?>
                <?php echo $form->textField($model, 'company', array('size' => 30, 'maxlength' => 80)); ?>
                <?php echo $form->error($model, 'company'); ?>
            </p>
        </div>
        <div class="col-md-1">
            <?php echo $form->labelEx($model, 'vatnum'); ?>
            <?php echo $form->textField($model, 'vatnum', array('size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'vatnum'); ?>
        </div>

    </div><!--block-->
    <div class="row"><!--Address block-->
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'address'); ?>
            <?php echo $form->textField($model, 'address', array('size' => 30, 'maxlength' => 80)); ?>
            <?php echo $form->error($model, 'address'); ?>
        </div>

        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'city'); ?>
            <?php echo $form->textField($model, 'city', array('size' => 30, 'maxlength' => 40)); ?>
            <?php echo $form->error($model, 'city'); ?>
        </div>

        <div class="col-md-1">
            <?php echo $form->labelEx($model, 'zip'); ?>
            <?php echo $form->textField($model, 'zip', array('size' => 10, 'maxlength' => 10)); ?>
            <?php echo $form->error($model, 'zip'); ?>
        </div>


    </div><!--block-->
    <div class="row"><!--Doc block-->


        <div class="col-md-1">
            <p><?php echo $form->labelEx($model, 'status'); ?></p>
            <?php echo $form->dropDownList($model, 'status', CHtml::listData(Docstatus::model()->findAllByAttributes(array('doc_type' => $model->doctype)), 'num', 'name')); //Docstatus::model()->findAll(); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>    

        <div class="col-md-2">
            <p><?php echo $form->labelEx($model, 'currency_id'); ?></p>
            <?php echo $form->dropDownList($model, 'currency_id', CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name')); //currency  ?>
            <?php echo $form->error($model, 'currency_id'); ?>
        </div>

        <div class="col-md-1">
            <?php echo $form->labelEx($model, 'refnum'); ?>
            <div id="Docsrefnum">
                <?php
                
                $model->getRef();
                if ($model->docDocs !== null) {
                    foreach ($model->docDocs as $doc) {
                        echo CHtml::link($doc->docType->name . " #" . $doc->docnum, array('docs/view', "id" => $doc->id)) . "<br />";
                    }
                }
                /*
                $perent = Docs::model()->findByPk($model->refnum);
                if ($perent) {
                    echo CHtml::link($perent->docType->name . " #" . $perent->docnum, array('docs/view', "id" => $model->refnum));
                }*/
                ?>
            </div>
            <?php echo CHtml::link(Yii::t('app', 'Clear refnum'), '#', array('onclick' => '$("#Docs_refnum_ids").val("");$("#Docsrefnum").html(""); return false;',)); ?>
            <br />
            <?php echo CHtml::link(Yii::t('app', 'Choose Doc'), '#', array('onclick' => '$("#choseRefDoc").dialog("open"); return false;',)); ?>

            <?php echo $form->hiddenField($model, 'refnum_ids', array('size' => 20, 'maxlength' => 20)); ?>
            <?php echo $form->error($model, 'refnum_ids'); ?>
        </div>

        <div class="col-md-1">
            <?php if ($model->docType->stockSwitch) { ?>
                <?php echo $form->labelEx($model, 'stockSwitch'); ?>


                <?php echo $form->checkBox($model, 'stockSwitch'); ?>
                <?php echo $form->error($model, 'stockSwitch'); ?>

            <?php } ?>
        </div>




        <div class="col-md-3">


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
                $this->widget('bootstrap.widgets.TbGridView', array(
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
                    <?php //echo $form->labelEx($model,'doc_id');  ?>
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
                    <th class="vat"><?php echo Yii::t('labels', 'VAT'); ?></th>
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
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));  ?>
                        <?php echo $form->error($model, 'discount'); ?>
                        <?php echo CHTML::checkBox("Docdiscount", '', array('value' => 1, 'uncheckValue' => 0)); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model, 'discount', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?>
                    </td>
                    <td></td>
                    <td class="docadd">
                        <?php echo Yii::t('app', 'New'); ?>
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
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));   ?>
                        <?php echo $form->error($model, 'sub_total'); ?>
                    </td>
                    <td>
                        <div id="docsub_total"></div>
                        <?php echo $form->hiddenField($model, 'sub_total', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?>
                    </td>
                    <td>
                        <div id="docvat"></div>
                        <?php echo $form->hiddenField($model, 'vat', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?>
                    </td>
                </tr>





                <tr>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php //echo $form->labelEx($model,'novat_total');   ?>
                        <?php //echo $form->error($model,'novat_total');   ?>
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
                    <th class="refnum"><?php echo Yii::t('labels', 'Refnum'); ?></th>

                    <th class="creditcompany"><?php echo Yii::t('labels', 'Credit Company'); ?></th>
                    <th class="cheque_num"><?php echo Yii::t('labels', 'Cheque No.'); ?></th>
                    <th class="bank"><?php echo Yii::t('labels', 'Bank'); ?></th>
                    <th class="branch"><?php echo Yii::t('labels', 'Branch'); ?></th>
                    <th class="cheque_acct"><?php echo Yii::t('labels', 'Cheque Account'); ?></th>
                    <th class="cheque_date"><?php echo Yii::t('labels', 'Cheque Date'); ?></th>
                    <th class="currency_id"><?php echo Yii::t('labels', 'Currency'); ?></th>
                    <th class="sum"><?php echo Yii::t('labels', 'Sum'); ?></th>
                    <th class="dep_date"><?php echo Yii::t('labels', 'Dep Date'); ?></th>

                    <th class="actions"><?php echo Yii::t('labels', 'Action'); ?></th>
                </tr>
            </thead>	
            <tfoot>
                <tr>
                    <td colspan='8'>
                        <textarea id="rcpt" style='display:none;'>       
                            <?php
                            echo $this->renderPartial('rcptdetial', array('model' => new Doccheques, 'form' => $form, 'i' => 'ABC'));
                            ?>
                        </textarea>      
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'src_tax'); ?>
                        <?php echo $form->error($model, 'src_tax'); ?>
                    </td>

                    <td>
                        <?php echo $form->textField($model, 'src_tax', array('size' => 8, 'maxlength' => 8, 'style' => "width: 65px;")); ?>
                    </td>
                    <td></td>
                    <td class="rcptadd"><?php echo Yii::t('app', 'New'); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan='8'>

                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'sub_total'); ?>
                        <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8));   ?>
                        <?php echo $form->error($model, 'sub_total'); ?>
                    </td>

                    <td>
                        <div id="rcptSum"></div>
                        <?php echo $form->hiddenField($model, "rcptsum"); ?>    
                        <?php //echo CHTML::hiddenField('rcptsum');   ?>
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
    ?>
    <!--</div>-->
    <script type="text/javascript">

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

                var pay_terms = data.pay_terms;
                //CalcDueDate(idate, pay_terms);
            }, "json")
                    .error(function() {
                    });
        });



        jQuery(document).ready(function() {
            $("#docs-form").submit(function() {

                if (($('#Docs_total').length) && ($('#Docs_rcptsum').length)) {
                    if (Number($('#Docs_total').val()) != Number($('Docs_rcptsum').val())) {
                        alert("sum is not equil");
                        return false;
                    }
                }
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





                //console.clear();
                //console.log('lets Build');
                //console.log($('#doc_items').val());
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
                $('#Doccheques_<?php echo $i; ?>_type').val(0);
                $('#Doccheques_<?php echo $i; ?>_type').trigger("liszt:updated");

                //console.clear();
                //console.log('lets Build');
                //console.log($('#rcpt_items').val());
                rcptcalcLines();
                // end specific commands
            });
            var docacc = true;
            //var det=new Array();
            $("#Docs_account_id").focus(function() {
                if ($("#Docs_account_id").val() == '' && docacc) {
                    $("#Docs_account_id").autocomplete("search", "");
                    docacc = false;
                }
            });

            var docoppacc = true;
            $("#Docs_oppt_account_id").focus(function() {
                if ($("#Docs_oppt_account_id").val() == '' && docacc) {
                    $("#Docs_oppt_account_id").autocomplete("search", "");
                    docoppacc = false;
                }
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

        });/*******************end ready*****************************/
        //function hideEmptyHeaders(){
        //	$('.templateTarget').filter(function(){return $.trim($(this).text())===''}).siblings('.templateHead').hide();
        //}

        function changeFileds() {//
            var type = <?php echo (int) $model->docType->oppt_account_type; ?>;
            if (type >= 1) {
                $("#Docs_company").prop('disabled', true);


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
                $('#Docs_oppt_account_id').parent().hide();

            }
        }

        function refNum(doc) {//


            $("#choseRefDoc").dialog("close");

            $('#Docsrefnum').html($('#Docsrefnum').html() + ", " + doc.doctype + " #" + doc.docnum);
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

            return false;


        }
        $('#Docs_currency_id').change(function() {
            var currency = $('#Docs_currency_id').val();

            $.get("<?php echo $this->createUrl('/'); ?>/index.php", {"r": "Currates/Getrate", "id": currency},
            function(data) {
                $('#doc_rate').val(data);
                var elements = $('.currSelect');
                for (var i = 0; i < elements.length; i++) {
                    index = elements[i].id.replace("Docdetails_", '').replace("_currency_id", '');
                    CalcPrice(index);
                }

            }, "json")
                    .error(function() {
                    });

        });


        $('#Docs_discount').change(function() {
            total = $('#Docs_total').val();
            discount = $('#Docs_discount').val();


            if ($('#Docdiscount').attr('checked')) {
                per = discount / 100;
            } else {
                per = (discount / total);
            }

            var elements = $('[id^=Docdetails][id$=invprice]');
            //console.log(per);
            for (var i = 0; i < elements.length; i++) {
                var linesum = Number($('#Docdetails_' + i + '_invprice').val());

                linesum = (linesum) - (linesum * per)
                $('#Docdetails_' + i + '_invprice').val(linesum.toFixed(2));
                sumChange(i, false);
            }
            CalcPriceSum(true);
        });



        $('#Docs_total').change(function() {
            //console.log('go');
            $('#doctotal').html($('#Docs_total').val());
        });
        $('#Docs_sub_total').change(function() {
            //console.log('go');
            $('#docsub_total').html($('#Docs_sub_total').val());
        });
        $('#Docs_vat').change(function() {
            //console.log('go');
            $('#docvat').html($('#Docs_vat').val());
        });


        function currChange(index) {
            var currency = $('#Docdetails_' + index + '_currency_id').val();
            //console.log(currency);
            $.get("<?php echo $this->createUrl('/'); ?>/index.php", {"r": "Currates/Getrate", "id": currency},
            function(data) {
                $('#Docdetails_' + index + '_rate').val(data);
                CalcPrice(index);
            }, "json")
                    .error(function() {
                    });


        }
        /*
         function nameChange(index) {
         var item_id = $('#Docdetails_'+index+'_name').val();
         $('#Docdetails_'+index+'_item_id').val(item_id);
         itemChange(index);      
         }*/

        function TypeSelChange(index) {
            var val = $('#Doccheques_' + index + '_type').val();

            //$('#Doccheques_'+index+"#banksel"+num).parent().append("<?php //echo PrintBankSelect();    ?>");
            $('#Doccheques_' + index + "_cheque_acct").attr('placeholder', '');
            $('#Doccheques_' + index + "_cheque_num").attr('placeholder', '');
            $('#Doccheques_' + index + "_branch").attr('placeholder', '');
            $('#Doccheques_' + index + "_banksel").remove();
            if ((val == 1) || (val == 3)) {
                $('#Doccheques_' + index + "_date").hide();
                $('#Doccheques_' + index + "_banksel").hide();
                $('#Doccheques_' + index + "_cheque_num").hide();
                $('#Doccheques_' + index + "_bank").hide();
                $('#Doccheques_' + index + "_branch").hide();
                $('#Doccheques_' + index + "_cheque_acct").hide();
            } else if (val == 2) {
                $('#Doccheques_' + index + "_date").show();
                $('#Doccheques_' + index + "_banksel").hide();
                $('#Doccheques_' + index + "_cheque_num").show();
                $('#Doccheques_' + index + "_bank").show();
                $('#Doccheques_' + index + "_branch").show();
                $('#Doccheques_' + index + "_cheque_acct").show();
            } else if (val == 4) {
                $('#Doccheques_' + index + "_date").show();
                $('#Doccheques_' + index + "_banksel").show();
                $('#Doccheques_' + index + "_cheque_num").show();
                $('#Doccheques_' + index + "_bank").show();
                $('#Doccheques_' + index + "_branch").show();
                $('#Doccheques_' + index + "_cheque_acct").show();
            } else if (val == 5) {
                $('#Doccheques_' + index + "_date").show();
                $('#Doccheques_' + index + "_banksel").hide();

                $('#Doccheques_' + index + "_bank").parent().append('<?php //echo PrintCreditCompany();    ?>');
                $('#Doccheques_' + index + "_bank").remove();

                $('#Doccheques_' + index + "_branch").show();
                $('#Doccheques_' + index + "_cheque_num").attr('placeholder', 'Reference');


                $('#Doccheques_' + index + "_cheque_acct").show();
                $('#Doccheques_' + index + "_branch").attr('placeholder', 'Number of payments');
                $('#Doccheques_' + index + "_cheque_num").show();
                $('#Doccheques_' + index + "_cheque_acct").attr('placeholder', 'last four digits of credit card');
            }
        }


        function itemChange(index) {
            var part = $('#Docdetails_' + index + '_item_id').val();
            $.get("<?php echo $this->createUrl('/'); ?>/index.php", {"r": "item/JSON", "id": part},
            function(data) {
                //console.log(data);
                //data = jQuery.parseJSON(data);
                //console.log(data);
                //data[1] = jQuery.parseJSON(data[1]);
                $('#Docdetails_' + index + '_name').val(data.name);
                //$('#Docdetails_'+index+'_name').trigger("liszt:updated");
                $('#Docdetails_' + index + '_description').val(data.description);
                $('#Docdetails_' + index + '_unit_price_org').val(data.saleprice);
                $('#Docdetails_' + index + '_unit_price').val(data.saleprice);

                $('#Docdetails_' + index + '_currency_id').val(data.currency_id);
                $('#Docdetails_' + index + '_currency_id').trigger("liszt:updated");
                currChange(index);

                $.get("<?php echo $this->createUrl('/'); ?>/index.php", {"r": "item/VatJSON", "id": part},
                function(smalldata) {
                    smalldata = jQuery.parseJSON(smalldata);
                    $('#Docdetails_' + index + '_accvat').val(smalldata.vat);
                });
                $('#Docdetails_' + index + '_rate').val("1");
                if ($('#Docdetails_' + index + '_qty').val() == 0)
                    $('#Docdetails_' + index + '_qty').val("1");
                //$('#Docdetails_'+index+'_qty').focus();
            }, "json")
                    .error(function() {
                    });
        }


        function detChange(index) {
            CalcPrice(index);
        }
        function vatChange(index) {


            var linesum = Number($('#Docdetails_' + index + '_invprice').val());
            var vat = Number($('#Docdetails_' + index + '_vat').val());


            if ($('#Docdetails_' + index + '_inclodeVat').attr('checked')) {
                $('#Docdetails_' + index + '_invprice').val(linesum + vat);
            } else {
                CalcPrice(index);
            }

            //CalcPriceSum();
        }
        function sumChange(index, calc) {
            calc = typeof calc !== 'undefined' ? calc : true;

            var qty = Number($('#Docdetails_' + index + '_qty').val());
            var uprice = Number($('#Docdetails_' + index + '_unit_price').val());
            var price = Number($('#Docdetails_' + index + '_price').val());
            var rate = Number($('#Docdetails_' + index + '_rate').val());
            var doc_rate = Number($('#doc_rate').val());
            var vatrate = Number($('#Docdetails_' + index + '_accvat').val());
            var linesum = Number($('#Docdetails_' + index + '_invprice').val());
            var vat = Number($('#Docdetails_' + index + '_vat').val());

            if ($('#Docdetails_' + index + '_inclodeVat').attr('checked')) {
                //console.log($('#Docdetails_'+index+'_inclodeVat'));
                vat = linesum * (vatrate / 100);
                price = (linesum - vat) / (doc_rate * rate);
                uprice = price / qty;
                //console.log(uprice);
            } else {
                vat = linesum * (vatrate / 100);
                price = (linesum) / (doc_rate * rate);
                uprice = price / qty;

            }

            $('#Docdetails_' + index + '_vat').val(vat.toFixed(2));//
            $('#Docdetails_' + index + '_vatlabel').html((linesum * (vat / 100)).toFixed(2) + " (%" + vatrate + ")");
            $('#Docdetails_' + index + '_price').val(price.toFixed(2));//
            $('#Docdetails_' + index + '_unit_price').val(uprice.toFixed(2));//
            if (calc)
                CalcPriceSum();
        }

        function priceChange(index) {
            var qty = Number($('#Docdetails_' + index + '_qty').val());
            var uprice = Number($('#Docdetails_' + index + '_unit_price').val());
            var price = Number($('#Docdetails_' + index + '_price').val());
            var rate = Number($('#Docdetails_' + index + '_rate').val());
            var doc_rate = Number($('#doc_rate').val());
            var vatrate = Number($('#Docdetails_' + index + '_accvat').val());
            var linesum = Number($('#Docdetails_' + index + '_invprice').val());
            var vat = Number($('#Docdetails_' + index + '_vat').val());


            linesum = price * (rate / doc_rate);
            vat = (price * (rate / doc_rate)) * (vatrate / 100);
            uprice = price / qty;


            //console.log(uprice);

            $('#Docdetails_' + index + '_vat').val(vat.toFixed(2));//
            $('#Docdetails_' + index + '_vatlabel').html((linesum * (vat / 100)).toFixed(2) + " (%" + vatrate + ")");
            $('#Docdetails_' + index + '_invprice').val(linesum.toFixed(2));//
            $('#Docdetails_' + index + '_unit_price').val(uprice.toFixed(2));//
            CalcPriceSum();
        }
        $('input').blur(function() {
            //
            if (this.id == 'Docs_oppt_account_id') {
                $.get("<?php echo $this->createUrl('/'); ?>/index.php", {"r": "/accounts/JSON", "id": $("#Docs_oppt_account_id").val()},
                function(data) {
                    //$("#Docs_company").val(data.name);
                    $('#Docs_oppt_account_id').parent().children('p').html(data.name);
                }, "json")
                        .error(function() {
                        });
            }//end oppt_account_id


            if (this.id == 'Docs_account_id') {

            }//end account_id

        });

        function CalcPrice(index, org) {
            var qty = $('#Docdetails_' + index + '_qty').val();
            //console.log("org:"+org);
            var uprice = $('#Docdetails_' + index + '_unit_price').val();
            if (org)
                uprice = $('#Docdetails_' + index + '_unit_price_org').val();

            var rate = $('#Docdetails_' + index + '_rate').val();
            var doc_rate = $('#doc_rate').val();
            var vat = $('#Docdetails_' + index + '_accvat').val();
            var itemtotal;

            var price = (uprice * qty).toFixed(2);
            $('#Docdetails_' + index + '_price').val(price);


            if (rate != doc_rate) {
                itemtotal = price * (rate / doc_rate);

            } else {
                itemtotal = price;

            }


            $('#Docdetails_' + index + '_vat').val((itemtotal * (vat / 100)).toFixed(2));
            $('#Docdetails_' + index + '_vatlabel').html((itemtotal * (vat / 100)).toFixed(2) + " (%" + vat + ")");
            $('#Docdetails_' + index + '_invprice').val(itemtotal);
            if (org)
                return itemtotal;//smart:>
            else
                CalcPriceSum();
        }

        function calcLines() {
            var elements = $('[id^=Docdetails][id$=line]');
            //var i=1;

            for (var i = 0; i < elements.length; i++) {

                //console.log(elements[i].id);
                $('#' + elements[i].id).val(i + 1);
                //i++;
            }

        }
        function CalcPriceSum(org) {
            var elements = $('[id^=Docdetails][id$=invprice]');
            var selements = $('[id^=Docdetails][id$=_vat]');
            var vattotal = 0;
            var subtotal = 0;
            //var novat_total=0;
            for (var i = 0; i < elements.length; i++) {
                //console.log(elements[i].id);
                if (org)
                    CalcPrice(i, org);
                var itemtotal = Number($('#' + elements[i].id).val());

                var vat = Number($('#' + selements[i].id).val());
                //console.log(vat);
                //console.log(selements[i].id);
                //if(vatper!=0){
                subtotal += itemtotal;
                vattotal += vat;
                //}else{
                //novat_total+=itemtotal;
                //}
            }
            $('#Docs_vat').val(vattotal.toFixed(2)).trigger('change');
            $('#Docs_sub_total').val(subtotal.toFixed(2)).trigger('change');
            $('#Docs_novat_total').val(subtotal.toFixed(2));
            $('#Docs_total').val((subtotal + vattotal).toFixed(2)).trigger('change');//novat_total
        }
        function CalcDueDate(valdate, pay_terms) {
            var em = 0;
            pay_terms = parseInt(pay_terms);
            if (pay_terms >= 0) {
                em = 0;
            } else {
                em = 1;
                pay_terms = pay_terms * -1;
            }
            //var duedate = $('#Docs_due_date');//document.form1.due_date;
            var dstr = valdate;
            var darr = dstr.split("-");
            var day = parseInt(darr[0]);
            var month = parseFloat(darr[1]);
            var year = parseInt(darr[2]);

            if (em) {
                month += 1;
                if (month > 12) {
                    month = 1;
                    year += 1;
                }
                day = 1;

            }

            D = new Date(year, month - 1, day);
            D.setDate(D.getDate() + pay_terms);
            day = D.getDate();
            month = D.getMonth() + 1;
            year = D.getFullYear();
            if (month >= 12) {
                month = 1;
                year += 1;
            }
            //aler
            $('#Docs_due_date').val(day + "-" + month + "-" + year);
        }
        /**********************************doc end******************************/

        function rcptSum() {
            var elements = $('[id^=Doccheques][id$=sum]');
            var total = 0;
            for (var i = 0; i < elements.length; i++) {
                var item = Number($('#' + elements[i].id).val());
                total += item;
            }
            $('#rcptSum').html((total).toFixed(2));
            $('#Docs_rcptsum').val(total);
        }

        function rcptcalcLines() {
            var elements = $('[id^=Doccheques][id$=line]');
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
            $('#docs-form').submit();
            //return false;
        }
    </script>
    <p>
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php
        echo $form->textArea($model, 'description', array(
            'rows' => 6, 'cols' => 50,
            'class' => 'form-control wysihtml5-editor'
        ));
        ?>
        <?php echo $form->error($model, 'description'); ?>
    </p>

    <p>
        <?php echo $form->labelEx($model, 'comments'); ?>
        <?php
        echo $form->textArea($model, 'comments', array(
            'rows' => 6, 'cols' => 50,
            'class' => 'form-control wysihtml5-editor'
        ));
        ?>
        <?php echo $form->error($model, 'comments'); ?>
    </p>

    <div class="btn">
        <!--</div>
        
        <div class="row buttons">-->
        <?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');  ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Preview'),
            'icon' => 'glyphicon glyphicon-file',
            'type' => 'primary',
            'htmlOptions' => array('onclick' => 'return sendForm("preview");',),
        ));
        ?>


        <?php
        $this->widget('bootstrap.widgets.TbButtonGroup', array(
            'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'type' => 'primary',
            'buttons' => array(
                array('icon' => 'glyphicon glyphicon-print', 'label' => Yii::t('app', 'Print'), 'htmlOptions' => array('onclick' => 'return sendForm("print");'),),
                array('items' => array(
                        //array('icon'=>'envelope','label'=>Yii::t('app','Email'), 'url'=>'javascript:sendForm("email");',),
                        array('icon' => 'glyphicon glyphicon-save', 'label' => Yii::t('app', 'PDF'), 'url' => 'javascript:sendForm("pdf");',),
                        array('icon' => 'glyphicon glyphicon-save', 'label' => Yii::t('app', 'Save'), 'url' => 'javascript:sendForm("save");',),
                    )),
            ),
        ));
        ?>

        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Change language'),
            'type' => 'primary',
            'icon' => 'glyphicon glyphicon-globe',
            'htmlOptions' => array('id' => 'printLink', 'onclick' => 'return hideMe();'),
        ));
        ?>

        <?php echo CHtml::dropDownList('language', Yii::app()->user->language, CHtml::listData(Language::model()->findAll(), 'id', 'name')); //Docstatus::model()->findAll();  ?>
        <!--</div>-->
    </div>

    <br /><br /><br /><br />
</div><!-- form -->
<?php $this->endWidget(); ?>


<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(//
    'id' => 'choseRefDoc',
    'options' => array(
        'title' => Yii::t('app', 'Chose Refernce Documenet'),
        'autoOpen' => false,
        'width' => '600px',
    ),
));
$dataProvider = new CActiveDataProvider('Docs');
echo $this->renderPartial('index');
//echo $this->renderPartial('index', array('dataProvider'=>$dataProvider,)); 

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>