
    $(document).ready(
            function() {
                addItem(0);
                $('#transaction-form').submit(function() {
                    if (Number($('#balance').val()) != 0) {
                        alert(msg);
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
        //console.log("fire!");
        var ni = document.getElementById('det');
        var num = last + 1;
        var IdName = "My" + num;
        var r = document.createElement('tr');
        var ca = document.createElement('td');
        var cb = document.createElement('td');
        var cc = document.createElement('td');
        var cd = document.createElement('td');

        var cg = document.createElement('td');
        var accountselect=accountSelect;
        
        r.setAttribute("id", 'tr' + IdName);
        cg.setAttribute("id", 'Action' + IdName);//id="FormTransaction_ops"
        ca.innerHTML = accountselect.replace('id="formtransaction-ops','id="formtransaction-ops'+num).replace('name="FormTransaction[ops','name="FormTransaction[ops]['+num);
        
        cb.innerHTML = "<div class='input-group date'>\
                        <span class='input-group-addon kv-date-calendar' title='Select date'>\
                            <i class='glyphicon glyphicon-calendar'></i>\
                        </span>\
                    <input type='text' id='valuedate"+num+"-disp' class='form-control' name='rname-w0' value='' data-krajee-datecontrol='datecontrol' data-datepicker-type='2' data-krajee-kvdatepicker='kvDatepicker'></div>\
                    <input type='hidden' id='valuedate" + num + "' name='FormTransaction[valuedates][" + num + "]'><input type=\"text\" id=\"valuedate" + num + "\" value=\"\" class=\"number\" name=\"FormTransaction[valuedate][" + num + "]\" size=\"6\ />\
                    ";

        cc.innerHTML = "<input type=\"text\" id=\"sumpos" + num + "\" value=\"0\" class=\"number\" name=\"FormTransaction[sumpos][" + num + "]\" size=\"6\" onblur=\"CalcSum(" + name + ")\" />";
        cd.innerHTML = "<input type=\"text\" id=\"sumneg" + num + "\" value=\"0\" class=\"number\" name=\"FormTransaction[sumneg][" + num + "]\" size=\"6\" onblur=\"CalcSum(" + name + ")\" />";

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
        
         var kvDatepicker = {"autoclose":true,"format":"dd/mm/yyyy"};
        var datecontrol = {
            "idSave":"valuedate" + num,
            "url":baseAddress +"/datecontrol/parse/convert",
            "type":"date",
            "saveFormat":"Y-m-d",
            "dispFormat":"d/m/Y",
            "asyncRequest":true};
       $("#valuedate" + num+"-disp").datecontrol(datecontrol);
        $('#'+"valuedate" + num+"-disp").kvDatepicker(kvDatepicker);
        
        
        
        $("#formtransaction-ops" + num).select2()
        .on("change", function(e) {
          console.log(e.val);
         // $("#formtransaction-ops" + num).val(e.val);
         // $("#formtransaction-ops" + num+' [value="'+e.val+'"]').attr('selected',true);//ugly fix but it just wont select:(
        });
       
    }


    function refNum(doc) {
        $('#popover-FormTransaction_refnum1').hide();
        //$("#popover-refnum").modal('hide');
        $('#FormTransaction_refnum1_div').html($('#FormTransaction_refnum1_div').html() + ", " + doc.doctype + " #" + doc.docnum);
        $('#FormTransaction_refnum1_ids').val($('#FormTransaction_refnum1_ids').val() + doc.id + ",");
        return false;
    }
