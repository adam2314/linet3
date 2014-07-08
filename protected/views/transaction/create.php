<?php
$this->menu = array(
        //array('label'=>'List Config','url'=>array('index')),
        //array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
$this->beginWidget('MiniForm', array('haeder' => Yii::t("app", "Create Manual Transaction")));
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'transaction-form',
    'enableAjaxValidation' => false,
        ));
?>


<div class="col-md-3">
    <?php //echo $form->labelEx($model, 'details'); ?>
    <?php echo $form->textFieldRow($model, 'details'); ?>
    <?php //echo $form->error($model, 'details'); ?>

    <?php echo $form->error($model, 'valuedate'); ?> 
    <?php echo $form->labelEx($model, 'valuedate'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'valuedate',
        'language' => 'en',
        'options' => array(
            'dateFormat' => Yii::app()->locale->getDateFormat('short'),
        )
            )
    );
    ?>
    <?php echo $form->error($model, 'valuedate'); ?>
</div>

<div class="col-md-3">   

    <div>
        <?php
        $this->widget('widgetRefnum', array(
            'model' => $model, //Model object
            'attribute' => 'refnum1', //attribute name
        )); //*/
        ?>
    </div>
    <?php //echo $form->labelEx($model, 'refnum1'); ?>
    <?php //echo $form->textField($model, 'refnum1'); ?>
    <?php //echo $form->error($model, 'refnum1'); ?>

    <?php //echo $form->labelEx($model, 'refnum2'); ?>
    <?php echo $form->textFieldRow($model, 'refnum2'); ?>
    <?php //echo $form->error($model, 'refnum2'); ?>

    <?php //echo $form->labelEx($model, 'currency_id'); ?>
    <?php echo $form->dropDownListRow($model, 'currency_id', CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name')); //currency  ?>
    <?php //echo $form->error($model, 'currency_id'); ?>
</div>
<div class="row">
    <div class="col-md-12">   
        <table class="formy">
            <tbody>
                <tr>
                    <th class="header"><?php echo Yii::t('app', "Account") ?></th>
                    <th class="header"><?php echo Yii::t('app', "Oppt Account") ?></th>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <table>
                            <thead>
                                <tr>
                                    <td><?php echo Yii::t('app', 'Account id'); ?></td>
                                    <td style="width:200px;"><?php echo Yii::t('app', 'Account Name'); ?></td>
                                    <td><?php echo Yii::t('app', 'Credit'); ?></td>
                                    <td><?php echo Yii::t('app', 'Debit'); ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                            'name' => 'Transactions[account_id]',
                                            'id' => 'Transactions_account_id',
                                            'value' => "$model->account_id",
                                            'source' => $this->createUrl('/accounts/autocomplete', array('type' => 'all')),
                                            'options' => array(
                                                'minLength' => 0,
                                                'showAnim' => 'fold',
                                            //'onblur'=>"onChange('Transactions_account_id')",
                                            ),
                                        ));
                                        ?>
                                        <?php echo $form->error($model, 'account_id'); ?>
                                    </td>
                                    <td>
                                        <span id="nameTransactions_account_id"></span>
                                    </td>
                                    <td>
                                        <input size="6" id="sourcepos" type="text" class="number" name="sourcepos" onchange="CalcSum()" value="0">
                                    </td>
                                    <td>
                                        <input size="6" id="sourceneg" type="text" class="number" name="sourceneg" onchange="CalcSum()" value="0">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <td><?php echo Yii::t('app', 'Account id'); ?></td>
                                    <td style="width:200px;"><?php echo Yii::t('app', 'Account Name'); ?></td>
                                    <td><?php echo Yii::t('app', 'Credit'); ?></td>
                                    <td><?php echo Yii::t('app', 'Debit'); ?></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td><?php echo Yii::t('app', 'balance'); ?></td>
                                    <td>
                                        <input size="5" id="balance" type="text" value="0" readonly="">
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                            <tbody id="det">

                            </tbody>

                        </table>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(
            function() {
                addItem(0);
                $('#Transactions_account_id').blur(function() {
                    onChange('Transactions_account_id');
                });


                $("#transaction-form").submit(function() {


                    if (Number($('#balance').val()) != 0) {
                        alert("sum is not 0");
                        return false;
                    }

                });

            }

    );

    function CalcSum() {
        var value = -1 * parseFloat($("#sourceneg").val()).toFixed(2);
        if (value == 0) {
            value = 1 * parseFloat($("#sourcepos").val()).toFixed(2);
            if (value == 0) {
                $("#sourcepos").removeAttr('disabled');//unlock all;
                $("#sourceneg").removeAttr('disabled');
                $("[id^=sumpos]").attr('disabled', true);//lock crap
                $("[id^=sumneg]").attr('disabled', true);
                $("[id^=sumpos]").val(0);
                $("[id^=sumneg]").val(0);
                //return;
            } else {
                $("#sourceneg").attr('disabled', true);//lock pos;
                $("#sourceneg").val(0);
                $("[id^=sumneg]").removeAttr('disabled');//unlock pos;
                $("[id^=sumpos]").attr('disabled', true);//lock neg;
                $("[id^=sumpos]").val(0);
            }
        } else {
            $("#sourcepos").attr('disabled', true);//lock neg
            $("#sourcepos").val(0);
            $("[id^=sumpos]").removeAttr('disabled');//unlock pos;
            $("[id^=sumneg]").attr('disabled', true);//lock neg;
            $("[id^=sumneg]").val(0);
        }
        var elements = $("[id^=sumpos]");
        var multi = (1);
        var credit = false;
        if (value > 0) {
            credit = true;
            elements = $("[id^=sumneg]");
            multi = (-1);
        }
        for (var i = 0; i < elements.length; i++) {
            if ($('#' + elements[i].id).val() != '') {
                if (parseFloat($('#' + elements[i].id).val()) >= 0) {
                    value += (multi * parseFloat($('#' + elements[i].id).val()).toFixed(2));
                    $('#' + elements[i].id).removeClass("error");
                    $("label[for=" + elements[i].id + "]").remove();
                } else {
                    if (!parseFloat($('#' + elements[i].id).val()).NaN)
                        markMyWords(elements[i].id);
                }
            }

        }
        $('#balance').val(value);
        return true;
    }



    function removeElement(divNum) {
        var d = document.getElementById('det');
        var olddiv = document.getElementById(divNum);
        d.removeChild(olddiv);
        CalcSum();
    }
    function addItem(last) {
        var ni = document.getElementById('det');
        var num = last + 1;
        var IdName = "My" + num;
        var r = document.createElement('tr');
        var ca = document.createElement('td');
        var cb = document.createElement('td');
        var cc = document.createElement('td');
        var cd = document.createElement('td');

        var cg = document.createElement('td');
        r.setAttribute("id", 'tr' + IdName);
        cg.setAttribute("id", 'Action' + IdName);
        ca.innerHTML = "<input placeholder=\"חפש פה...\" type=\"text\" id=\"ops" + num + "\" class=\"number\" name=\"ops[]\" onblur=\"onChange('ops" + num + "')\" size=\"8\" />";
        cb.innerHTML = "<span id=\"nameops" + num + "\"></span>";
        cc.innerHTML = "<input type=\"text\" id=\"sumpos" + num + "\" value=\"0\" class=\"number\" name=\"sumpos[]\" size=\"6\" onblur=\"CalcSum(" + name + ")\" />";
        cd.innerHTML = "<input type=\"text\" id=\"sumneg" + num + "\" value=\"0\" class=\"number\" name=\"sumneg[]\" size=\"6\" onblur=\"CalcSum(" + name + ")\" />";

        cg.innerHTML = "<a href=\"javascript:addItem(" + num + ");\" class=\"btnadd\">הוסף</a>";

        if (last != 0) {
            var lastaction = document.getElementById('ActionMy' + last);
            lastaction.innerHTML = "<a href=\"javascript:;\" onclick=\"removeElement(\'trMy" + last + "\')\" class=\"btnremove\">X</a>";
        }
        //replace add button with remove

        r.appendChild(ca);
        r.appendChild(cb);
        r.appendChild(cc);
        r.appendChild(cd);

        r.appendChild(cg);

        ni.appendChild(r);
        $("#ops" + num).autocomplete({
            source: "<?php echo $this->createUrl('/accounts/autocomplete', array('type' => 'all')); ?>",
            open: function() {
                $(this).autocomplete('widget').css('z-index', 2048);
                return false;
            }
        });
    }

    function onChange(name) {
        var acc = $('#' + name).val();
        $.get("<?php echo $this->createUrl('/accounts/json'); ?>", {"id": acc},
        function(data) {
            $('#name' + name).html(data.name);
        }, "json")
                .error(function() {
                });
    }
    function refNum(doc) {//


        $("#choseTransactions_refnum1").dialog("close");

        $('#Transactions_refnum1_div').html($('#Transactions_refnum1_div').html() + ", " + doc.doctype + " #" + doc.docnum);
        $('#Transactions_refnum1_ids').val($('#Transactions_refnum1_ids').val() + doc.id + ",");



        return false;


    }



</script>


<?php
/*
  foreach($models as $model){
  echo $form->errorSummary($model);

  echo "<p>".Yii::t('app',$model->id);
  echo $form->textField($model,'['.$model->id.']value',array('size'=>30,'maxlength'=>80))."</p>";


  }
 * 
 */
?>  

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => Yii::t('app', "Save"),
    ));
    ?>
</div>

<?php //echo CHtml::submitButton(Yii::t('app', "Save")); ?>    
<?php $this->endWidget(); ?>



<?php
$this->endWidget();
?>