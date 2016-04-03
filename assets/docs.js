/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




var billed = [];



function callbackacc(data) {//
    var newOpt = '<option value="' + data.id + '">' + data.name + '</option>';
    $("#docs-account_id").append(newOpt);



}

function callbackitm(data) {//
    var newOpt = '<option value="' + data.id + '">' + data.name + '</option>';
    var selector = '<select id="docdetails-abc-item_id" class="form-control" name="Docdetails[ABC][item_id]">';
    $("[id^=docdetails-][id$=-item_id]").append(newOpt);

    $('#doc').val($('#doc').val().replace(selector, selector + newOpt));
}
/******************************************************************************************************************************************/

//$("#docdetails-$i-currency_id").select2();
//$("#docdetails-$i-item_id").select2();
//$("#docdetails-$i-unit_id").select2();

jQuery(function ($) {
$("#docs-account_id").change();
    //CalcPrice($i);
});



$(document).on("change", "[id^=docdetails-][id$=-currency_id]", function () {
    i = this.id.replace("docdetails-", "");
    i = i.replace("-currency_id", "");
    CalcPrice(i);
});

$(document).on("change", "[id^=docdetails-][id$=-item_id]", function () {
    i = this.id.replace("docdetails-", "");
    i = i.replace("-item_id", "");
    itemChange(i);
});

$(document).on("change", "[id^=docdetails-][id$=-qty]", function () {
    i = this.id.replace("docdetails-", "");
    i = i.replace("-qty", "");
    CalcPrice(i);
});
$(document).on("change", "[id^=docdetails-][id$=-iitem]", function () {
    i = this.id.replace("docdetails-", "");
    i = i.replace("-iitem", "");
    CalcPrice(i);
});
$(document).on("change", "[id^=docdetails-][id$=-itotalvat]", function () {
    i = this.id.replace("docdetails-", "");
    i = i.replace("-itotalvat", "");
    CalcPrice(i, "CalcPriceWithVat");
});
$(document).on("click", ".detRemove", function () {
    $(this).parent().next().remove();
    $(this).parent().remove();
    CalcPriceSum();
    calcLines();
});
/******************************************************************************************************************************************/




$(document).on("change", "input", function () {
    submits();

});




function submits() {
    var from = "ajax=docs-form&" + $("#docs-form").serialize();
    var type = $('#docs-doctype').val();
    $.post(baseAddress + "/docs/create/" + type, from,
            function (data) {
                $('.help-block').html('');
                $('.form-group').removeClass('has-error');
                val = true;
                $.each(data.body, function (key, value) {
                    val = false;
                    markMe(key, value);

                });

                //if(val)
                //    $("#settings-form").submit();
            }, "json")
            .error(function () {
            });
}



function markMe(fieldName, error) {
    //console.log("docs-" + fieldName);
    field = $("#docs-" + fieldName).next().html(error).show();
    $("#docs-" + fieldName).parent().addClass('has-error');
    //$(field).html(error);
    //$(field).show();

}





/******************************************************************************************************************************************/

$(document).on("change", "[id^=doccheques-][id$=-sum]", function () {
    rcptSum();
});

$(document).on("click", ".chqRemove", function () {

    $(this).parents(".rcptContent:first").remove();
    rcptcalcLines();
});

/******************************************************************************************************************************************/

$("#docs-account_id").change(function () {
    var idate = $('#docs-issue_date').val();
    $.get(baseAddress + "/accounts/json/" + $("#docs-account_id").val(), //{"r": "/accounts/JSON", "id": $("#docs-account_id").val()},
            function (data) {
                if(data!==null){
                    $("#docs-company").val(data.name);
                    $("#docs-address").val(data.address);
                    $("#docs-city").val(data.city);
                    $("#docs-zip").val(data.zip);
                    $("#docs-vatnum").val(data.vatnum);
                    $("#docs-currency_id").val(data.currency_id);
                    //$("#docs-currency_id").trigger("liszt:updated");
                    $("#docs-currency_id").trigger("change");

                    $("#docs-vatnum").trigger("change");
                    var pay_terms = data.pay_terms;
                }
                //CalcDueDate(idate, pay_terms);
            }, "json")
            .error(function () {
            });
});

/**********************************************************************************************************************************/

/**********************************************************************************************************************************/
$("#docs-form").submit(function () {
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
$(".docadd").click(function () {

    var template = $('#doc').val();

    //var i=$(".templateTarget tr").length;
    var i = $('[name="doc_items"]').val() * 1;
    template = template.replace(/ABC/g, i);
    template = template.replace(/abc/g, i);
    //template = template.replace(/Docdetails/g, 'docdetails');

    //template    

    $('.docTarget').append(template);


    var textbox = $("#docdetails-" + i + "_description");
    var textarea = $("<textarea style='width:100%' rows='1' name='Docdetails[" + i + "][description]' id='Docdetails_" + i + "_description'></textarea>");
    textarea.val(textbox.val());
    //Replace textbox with textarea
    textbox = textbox.replaceWith(textarea);



    $('[name="doc_items"]').val(i + 1);
    // start specific commands
    //jQuery.when(jQuery('#docdetails-'+i+'-item_id')).select2();
    jQuery.when(jQuery('#docdetails-' + i + '-item_id').select2({"width": "resolve"})).done(
            
            //initSelect2Loading('docdetails-' + i + '-item_id')
            
            );
    jQuery('#docdetails-' + i + '-item_id').on('select2-open', function () {
        //initSelect2DropStyle('docdetails-' + i + '-item_id')
    });

    jQuery.when(jQuery('#docdetails-' + i + '-unit_id').select2({"width": "resolve"})).done(
            //initSelect2Loading('docdetails-' + i + '-unit_id')
            
            );
    jQuery('#docdetails-' + i + '-unit_id').on('select2-open', function () {
        //initSelect2DropStyle('docdetails-' + i + '-unit_id')
    });

    jQuery.when(jQuery('#docdetails-' + i + '-currency_id').select2({"width": "resolve"})).done(
            //initSelect2Loading('docdetails-' + i + '-currency_id')
            
            );
    jQuery('#docdetails-' + i + '-currency_id').on('select2-open', function () {
        //initSelect2DropStyle('docdetails-' + i + '-currency_id')
    });
    $('#docdetails-' + i + '-item_id').trigger('change');
    calcLines();
    // end specific commands
});


$(".rcptadd").click(function () {

    var template = $('#rcpt').val();

    //var i=$(".templateTarget tr").length;
    var i = $('[name="rcpt_items"]').val() * 1;
    template = template.replace(/ABC/g, i);
    template = template.replace(/abc/g, i);


    $('.rcptTarget').append(template);
    $('[name="rcpt_items"]').val(i + 1);
    // start specific commands
    //$('#Doccheques_<?php echo $i; ?>_type').val(0);
    //$('#Doccheques_<?php echo $i; ?>_type').trigger("liszt:updated");
    //$('#doccheques-'+i+'-type').trigger('change');
    TypeSelChange(i);
    //console.log('#doccheques-'+i+'-type');
    rcptcalcLines();
    // end specific commands
});


//$("#resizable").resizable();

var elements = $('tr.filters > td > [name^=Docs]');
for (var i = 0; i < elements.length; i++) {
    elements[i].name = elements[i].name.replace("Docs", "Docsfilter");
    //console.log(elements[i].name);

}

$('#langSel').hide();

changeFileds();

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
    //console.log(str);
    $.post(baseAddress + '/payment/bill' + type, str,
            function (data) {

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

        /*$.post("<?php echo yii\helpers\BaseUrl::base().'/payment/form'; ?>/" + elements[i].value, {"bill": {"sum": $(sums[i]).val(), "line": [i]}}, //"bill"
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
    var type = oppt_account_type;
    if (type >= 1) {
        //$("#docs-company").prop('disabled', true);


        $("#docs-status").parent().hide();
        $("#docs-address").parent().hide();
        $("#docs-city").parent().hide();
        $("#docs-zip").parent().hide();

        //$("#docs-vatnum").parent().hide();
        $("#docs-zip").parent().hide();

        //$("#Docsrefnum").parent().hide();
        //$("#docs-due_date").parent().hide();

        $('#docs-discount').hide();

        //$('.formtable tr th:nth-child(3)').hide();
        //$('.formtable tr td:nth-child(3)').hide();

        //$('.formtable tr th:nth-child(7)').hide();
        //$('.formtable tr td:nth-child(7)').hide();

        //$('.formtable tr th:nth-child(9)').hide();
        //$('.formtable tr td:nth-child(9)').hide();
    } else {
        //$('#docs-oppt_account_id').parent().hide();
        $('#docs-ref_date').parent().remove();

        $('#docs-oppt_account_id').parent().remove();
    }
}

function refNum(doc) {//

    //$("#popover-docs-refnum").modal('hide');
    //$('#popover-docs_refnum').hide();
    $('#popover-docs_refnum').modal("hide");
    $('#docs_refnum_div').html($('#docs_refnum_div').html() + ", " + doc.doctype + " #" + doc.docnum);
    $('#docs_refnum_ids').val($('#docs_refnum_ids').val() + doc.id + ",");



    $('#docs-account_id').val(doc.account_id);
    //$("#docs-account_id").trigger("liszt:updated");
    $('#docs-account_id').trigger("change");

    $("#docs-company").val(doc.company);
    $("#docs-address").val(doc.address);
    $("#docs-city").val(doc.city);
    $("#docs-zip").val(doc.zip);
    $("#docs-vatnum").val(doc.vatnum);
    $("#docs-currency_id").val(doc.currency_id);
    //$("#docs-currency_id").trigger("liszt:updated");
    $("#docs-currency_id").trigger("change");


    if ($('#doccheques-0-sum').val() == '') {
        $('#doccheques-0-sum').val('0');
    }
    $('#doccheques-0-sum').val(parseFloat($('#doccheques-0-sum').val()) + parseFloat(doc.total));
    rcptSum();
    return false;


}

/*
 function nameChange(index) {
 var item_id = $('#docdetails-'+index+'_name').val();
 $('#docdetails-'+index+'_item_id').val(item_id);
 itemChange(index);      
 }*/

function TypeSelChange(index) {
    var val = $('#doccheques-' + index + '-type').val();
    var sum = $('#doccheques-' + index + '-sum').val();
    var line = index;
    $('#doccheques-' + index + '-text').html('');
    $.post(baseAddress + "/payment/fields/" + val, {"bill": {"sum": sum, "line": line}}, //"bill"
    function (data) {

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
    var part = $('#docdetails-' + index + '-item_id').val();
    $.get(baseAddress + "/item/json/" + part, //{"r": "", "id": part},
            function (data) {

                $('#docdetails-' + index + '-name').val(data.name);
                //$('#docdetails-'+index+'_name').trigger("liszt:updated");
                $('#docdetails-' + index + '-description').val(data.description);
                $('#Docdetails-' + index + '-ihItem').val(data.saleprice);
                $('#docdetails-' + index + '-iitem').val(data.saleprice);
                $('#docdetails-' + index + '-currency_id').val(data.currency_id);
                //$('#docdetails-' + index + '_currency_id').trigger("liszt:updated");
                $('#docdetails-' + index + '-currency_id').trigger("change");
                $('#docdetails-' + index + '-unit_id').val(data.unit_id);
                //$('#docdetails-' + index + '_unit_id').trigger("liszt:updated");
                $('#docdetails-' + index + '-unit_id').trigger("change");
                //currChange(index);

                $('#docdetails-' + index + '-rate').val("1");
                if ($('#docdetails-' + index + '-qty').val() == 0) {
                    $('#docdetails-' + index + '-qty').val("1");

                }

                CalcPrice(index);
                //$('#docdetails-' + index + '_iVatRate').val(data.vat);

            }, "json")
            .error(function () {
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
    var doc_rate = $("[name='doc_rate']").val();
    var parms = '&Docdetails[' + index + '][doc_rate]=' + doc_rate + '&Docdetails[line]=' + index + hChange;
    var form = $('[id^=docdetails-' + index + ']').serialize() + parms;

    $.post(baseAddress + "/docdetails/calc", form,
            function (data) {
                $.each(data.body, function (key, value) {
                    $('#docdetails-' + index + '-' + key).val(value);
                });
                $('#docdetails-' + index + '-iitem').val(data.body.iItem);
                $('#Docdetails-' + index + '-ihTotal').val(data.body.ihTotal);
                $('#docdetails-' + index + '-itotalvat').val(data.body.iTotalVat);
                $('#docdetails-' + index + '-iTotallabel').html(data.body.iTotal);
                //if (calc === undefined) 
                return CalcPriceSum();
                //else
                //    return data.body.iTotal;
            }, "json")
            .error(function (data) {
                console.log(data);
            });




}



function CalcPriceSum(org) {
    //$('#subType').val('calc');

    $.post(baseAddress + "/docs/calc", $("#docs-form").serialize(),
            function (data) {
                $('#docs-vat').val(data.body.vat).trigger('change');
                $('#docs-sub_total').val(data.body.sub_total).trigger('change');
                $('#docs-novat_total').val(data.body.novat_total).trigger('change');
                $('#docs-total').val(data.body.total).trigger('change');
                $('#docs-rcptsum').val(data.body.rcptsum).trigger('change');
            }, "json")
            .error(function (data) {
                console.log(data);
            });


}




/**********************************Discount*****************************/
///*
$('#docs-discount').blur(function () {

    CalcPriceSum();

});
//*/

/**********************************CurChange****************************/
$('#docs-currency_id').change(function () {
    var currency = $('#docs-currency_id').val();

    $.get(baseAddress + "/currates/getrate/" + currency, //{"r": "Currates/Getrate", "id": currency},
            function (data) {
                $('#doc_rate').val(data.body);
                var elements = $('.currSelect');
                for (var i = 0; i < elements.length; i++) {
                    index = elements[i].id.replace("Docdetails_", '').replace("_currency_id", '');
                    CalcPrice(index);
                }

            }, "json")
            .error(function () {
            });

});

$('#docs-total').change(function () {
    $('#doctotal').html($('#docs-total').val());
});

$('#docs-sub_total').change(function () {
    $('#docsub_total').html($('#docs-sub_total').val());
});

$('#docs-novat_total').change(function () {
    $('#docnovat_total').html($('#docs-novat_total').val());
});

$('#docs-vat').change(function () {
    $('#docvat').html($('#docs-vat').val());
});

$('#docs-rcptsum').change(function () {
    $('#rcptSum').html($('#docs-rcptsum').val());
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
    $('#s2id_language').show(150);
    return false;
}




function sendForm(value) {//preview,print,mail,pdf,save

    $('[name="subType"]').val(value);
    if (value == 'preview')
        $("#docs-form").attr('target', '_BLANK');




    /*
     if (($('#docs-total').length) && ($('#docs-rcptsum').length)) {
     if (Number($('#docs-total').val()) != Number($('#docs-rcptsum').val())) {
     alert("<?php echo Yii::t('app', 'Sum is not equal'); ?>");
     return false;
     }
     }*/


    rcptBill();



    $('#docs-form').submit();
    //anti chrome wait.
    setTimeout(continueExecution, 1000);

}

function continueExecution()
{
    $('[name="subType"]').val('calc');
}