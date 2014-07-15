<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'docs-form',
    'enableAjaxValidation' => true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));



$i = 0;

////must
//docid
//line
//type
//
//refnum
//creditcompany
//cheque_num
//bank
//branch
//cheque_acct
//cheque_date
//currency_id
//sum
//dep_date
?>


<b><?php echo $form->labelEx($model, 'type'); ?></b>
<?php //echo $form->hiddenField($model, "[$i]id");  ?>
<?php echo $form->hiddenField($model, "[$i]doc_id"); ?>
<?php echo $form->hiddenField($model, "[$i]line"); ?>

<b><?php echo $form->labelEx($model, 'type'); ?></b>


<?php
$temp = CHtml::listData(PaymentType::model()->findAll(), 'id', 'name');
$temp[0] = Yii::t('app', 'None');


echo $form->dropDownList($model, "[$i]type", $temp);
?>





<div id="addme"></div>

<td class="remove">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => Yii::t('app', 'Remove'),
        'icon' => 'glyphicon glyphicon-remove',
    ));
    ?>
</td>
<script type="text/javascript">
    var refnum = {
    "type": "text",
            "value": "123",
            "options": {
            "streetAddress": "21 2nd Street",
                    "city": "New York",
                    "state": "NY",
                    "postalCode": 10021
            },
            'placeholder': 'refnum',
            'name': 'refnum',
            'id': 'refnum', //defults to name
            'label': 'refnum' //defults to name
            //"phoneNumbers": [
            //    "212 555-1234",
            //    "646 555-4567"
            //]
    };
            var creditcompany = {
            "type": "text",
                    "value": "",
                    "options": {
                    "streetAddress": "21 2nd Street",
                            "city": "New York",
                            "state": "NY",
                            "postalCode": 10021
                    },
                    'placeholder': 'creditcompany',
                    'name': 'creditcompany',
                    'id': 'creditcompany', //defults to name
                    'label': 'creditcompany' //defults to name
                    //"phoneNumbers": [
                    //    "212 555-1234",
                    //    "646 555-4567"
                    //]
            };
            var cheque_num = {
            "type": "text",
                    "value": "",
                    "options": {
                    "streetAddress": "21 2nd Street",
                            "city": "New York",
                            "state": "NY",
                            "postalCode": 10021
                    },
                    'placeholder': 'cheque_num',
                    'name': 'cheque_num',
                    'id': 'cheque_num', //defults to name
                    'label': 'cheque_num' //defults to name
                    //"phoneNumbers": [
                    //    "212 555-1234",
                    //    "646 555-4567"
                    //]
            };
            var bank = {
            "type": "text",
                    "value": "",
                    "options": {
                    "streetAddress": "21 2nd Street",
                            "city": "New York",
                            "state": "NY",
                            "postalCode": 10021
                    },
                    'placeholder': 'bank',
                    'name': 'bank',
                    'id': 'bank', //defults to name
                    'label': 'bank' //defults to name
                    //"phoneNumbers": [
                    //    "212 555-1234",
                    //    "646 555-4567"
                    //]
            };
            var branch = {
            "type": "text",
                    "value": "",
                    'placeholder': 'branch',
                    'name': 'branch',
                    'id': 'branch', //defults to name
                    'label': 'branch' //defults to name
                    //"phoneNumbers": [
                    //    "212 555-1234",
                    //    "646 555-4567"
                    //]
            };
            var cheque_acct = {
            "type": "text",
                    "value": "",
                    "options": {
                    "streetAddress": "21 2nd Street",
                            "city": "New York",
                            "state": "NY",
                            "postalCode": 10021
                    },
                    'placeholder': 'cheque_acct',
                    'name': 'cheque_acct',
                    'id': 'cheque_acct', //defults to name
                    'label': 'cheque_acct' //defults to name
                    //"phoneNumbers": [
                    //    "212 555-1234",
                    //    "646 555-4567"
                    //]
            };
            var cheque_date = {
            "type": "date",
                    "value": "",
                    'placeholder': 'cheque_date',
                    'name': 'cheque_date',
                    'id': 'cheque_date', //defults to name
                    'label': 'cheque_date' //defults to name
                    //"phoneNumbers": [
                    //    "212 555-1234",
                    //    "646 555-4567"
                    //]
            };
            var currency_id = {
            "type": "select",
                    "value": "",
                    "options": {
                    "streetAddress": "21 2nd Street",
                            "city": "New York",
                            "state": "NY",
                            "postalCode": 10021
                    },
                    'placeholder': 'currency_id',
                    'name': 'currency_id',
                    'id': 'currency_id', //defults to name
                    'label': 'currency_id' //defults to name
                    //"phoneNumbers": [
                    //    "212 555-1234",
                    //    "646 555-4567"
                    //]
            };
            var sum = {
            "type": "text",
                    "value": "",
                    'placeholder': 'sum',
                    'name': 'sum',
                    'id': 'sum', //defults to name
                    'label': 'sum' //defults to name
                    //"phoneNumbers": [
                    //    "212 555-1234",
                    //    "646 555-4567"
                    //]
            };
            var dep_date = {
            "type": "date",
                    "value": "",
                    'placeholder': 'dep_date',
                    'name': 'dep_date',
                    'id': 'dep_date', //defults to name
                    'label': 'dep_date' //defults to name
                    //"phoneNumbers": [
                    //    "212 555-1234",
                    //    "646 555-4567"
                    //]
            };
            var types = [refnum, creditcompany, cheque_num, bank, branch, cheque_acct, cheque_date, currency_id, sum, dep_date];
//refnum
//creditcompany
//
//cheque_num
//bank
//branch
//cheque_acct
//cheque_date
//currency_id
//sum
//dep_date

            //$("#Doccheques_<?php echo $i; ?>_type").prepend("<option value='0'><?php echo Yii::t('app', 'Chose Payment type'); ?></option>");
            $("#Doccheques_<?php echo $i; ?>_type").chosen();
            //$("#Doccheques<?php echo $i; ?>_currency_id").chosen();
            $("#Doccheques_<?php echo $i; ?>_bank").chosen();
            //jQuery('#Doccheques_<?php echo $i; ?>_cheque_date').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['<?php echo substr(Yii::app()->language, 0, 2) ?>'], {'showAnim':'fold','dateFormat':'<?php echo Yii::app()->locale->getDateFormat('short') ?>'}));


            $(document).ready(function() {
    //jQuery("#Doccheques_<?php echo $i; ?>_bank").autocomplete({"minLength":0, "showAnim": "fold", "source": "/yii/demos/new/index.php?r=bankName/autocomplete"});
    //rcptSum();

    addline(types);
            $("#Doccheques_<?php echo $i; ?>_type").change(function() {
    TypeSelChange(<?php echo $i; ?>);
    });
    });
            function addline(line) {

            var text = '';
                    for (i = 0; i < line.length; i++) {
            text += parseField(line[i]);
            }
            $('#addme').html(text);
            }

    function parseField(field) {
        var text = '';
        if (field.type == 'text') {
            return "<input "+parsePerm(field)+"type='text'>";
        }
        if (field.type == 'select') {
            return "<select "+parsePerm(field)+">" + addOptions(field.options) + "</select>";
        }
        if (field.type == 'date') {
            
            
            return "<input "+parsePerm(field)+"type='text'>";
            
            //jQuery('#'+field.id).datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['he'],{'showAnim':'fold','dateFormat':'dd/mm/yy','changeMonth':'true','changeYear':'true','constrainInput':'false'}));

        }
    }

    function parsePerm(field){
        var text='';
        if(field.id!== 'undefined'){
            text+="id='"+field.id+"' ";
        }
        if(field.value!== 'undefined'){
            text+="value='"+field.value+"' ";
        }
        if(field.name!== 'undefined'){
            text+="name='"+field.name+"' ";
        }
        if(field.placeholder!== 'undefined'){
            text+="placeholder='"+field.placeholder+"' ";
        }
        return text;
    }

    function addOptions(options){//forselect
    var text = '';
            for (var key in options) {
    text += "<option value='" + key + "'>"+options[key]+"</option>";
    }
    return text;
    }



</script>

</tr>

<?php $this->endWidget(); ?>