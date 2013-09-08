

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docs-form',
	'enableAjaxValidation'=>false,
)); 

?>
<div class="form">
	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model,"doctype"); ?>
        <?php echo CHTML::hiddenField("cur_rate","1"); ?>
        <?php echo CHTML::hiddenField("doc_rate","1"); ?>
	<?php echo CHTML::hiddenField("doc_items",count($model->docDetailes)); ?>
        <?php echo CHTML::hiddenField("rcpt_items",count($model->docCheques)); ?>
<div class="span4"><!--block-->
	<p>
		<?php echo $form->labelEx($model,'account_id'); ?>
		<?php //echo $model->docType->account_type . ";".Acctype::model()->getType('customers');
		
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	    'name'=>'Docs[account_id]',
		'id'=>'Docs_account_id',
	    'value'=>"$model->account_id",
	    'source'=>$this->createUrl('/accounts/autocomplete',array('type'=>$model->docType->account_type)),
		//'source'=>'/accounts/autocomplete&type='.Acctype::model()->getType('outcomes'),
	    // additional javascript options for the autocomplete plugin
	    'options'=>array(
                    'minLength'=>0,
	            'showAnim'=>'fold',
	    ),
	));
		
		?>
		<?php echo $form->error($model,'account'); ?>
	</p>

	<p>
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company',array('size'=>30,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'company'); ?>
	</p>
    
        <p>
            <?php echo $form->labelEx($model,'status'); ?>
            <?php echo $form->dropDownList($model,'status',CHtml::listData(Docstatus::model()->findAllByAttributes(array('doc_type'=>$model->doctype)), 'num', 'name'));//Docstatus::model()->findAll();?>
            <?php //echo $form->textField($model,'status'); ?>
            <?php echo $form->error($model,'status'); ?>
        </p>
</div><!--block-->
<div class="span3"><!--block-->
	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>30,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>30,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'currency_id'); ?>
		<?php echo $form->dropDownList($model,'currency_id',CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name'));//currency ?>
		<?php echo $form->error($model,'currency_id'); ?>
	</div>
</div><!--block-->
<div class="span4"><!--block-->
	<div class="row">
		<?php echo $form->labelEx($model,'vatnum'); ?>
		<?php echo $form->textField($model,'vatnum',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'vatnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refnum'); ?>
            <div id="Docsrefnum">
		<?php 
                $perent=Docs::model()->findByPk($model->refnum);
                if($perent){
                        echo CHtml::link($perent->docType->name." #".$perent->docnum,array('docs/view',"id"=>$model->refnum));    
                }
                ?>
            </div>
                <?php echo CHtml::link('Clear refnum', '#', array('onclick'=>'$("#Docs_refnum").val("");$("#Docsrefnum").html(""); return false;',)); ?>
                <?php echo CHtml::link('Choose Doc', '#', array('onclick'=>'$("#choseRefDoc").dialog("open"); return false;',)); ?>
            
                <?php echo $form->hiddenField($model,'refnum',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'refnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue_date'); ?>
		<?php //$model->issue_date=Yii::app()->locale->getDateFormat('short');
		//echo $form->textField($model,'issue_date',array('')); ?>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
                        'name'=>'Docs[issue_date]',
                            'language' => 'en',
			//'value'=>$model->issue_date,
                        'value'=>$model->issue_date,    
                            'defaultOptions' => array(  // (#3)
                                    //'showOn' => 'focus', 
                                    'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                                    //'showOtherMonths' => true,
                                    //'selectOtherMonths' => true,
                                    //'changeMonth' => true,
                                    //'changeYear' => true,
                                    //'showButtonPanel' => true,
                                )
	       	 )
	        );?>
		<?php echo $form->error($model,'issue_date'); ?>
	</div>
<?php echo Yii::app()->locale->getDateFormat('short');?>
	<div class="row">
		<?php echo $form->labelEx($model,'due_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
                        'name'=>'Docs[due_date]',
                            'language' => 'en',
			//'value'=>$model->due_date,
                        'value'=>$model->due_date,    
                            'defaultOptions' => array(  // (#3)
                                    //'showOn' => 'focus', 
                                    'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                                    //'showOtherMonths' => true,
                                    //'selectOtherMonths' => true,
                                    //'changeMonth' => true,
                                    //'changeYear' => true,
                                    //'showButtonPanel' => true,
                                )
	       	 )
	        );?>
		<?php echo $form->error($model,'due_date'); ?>
	</div>
    </div>
</div><!-- form -->


<?php 
		if($model->docType->isdoc){
			
			?>
<div class="form">	
<table  data-role="table" class="formtable" ><!-- docdetalies -->
	
	<!--<div class="row">-->
		<thead>
                    <tr  class="head1">
                            <?php //echo $form->labelEx($model,'doc_id'); ?>
                                            <th><?php echo $form->labelEx($model,'item_id'); ?></th>
                                            <th><?php echo $form->labelEx($model,'name'); ?></th>
                                            <th><?php echo $form->labelEx($model,'description'); ?></th>
                                            <th><?php echo $form->labelEx($model,'qty'); ?></th>
                                            <th><?php echo $form->labelEx($model,'unit_price'); ?></th>
                                            <th><?php echo $form->labelEx($model,'currency'); ?></th>
                                            <th><?php echo $form->labelEx($model,'price'); ?></th>
                                            <th style="width: 90px;"><?php echo $form->labelEx($model,'invprice'); ?></th>
                                            <th style="width: 90px;"><?php echo $form->labelEx($model,'VAT'); ?></th>
                                            <th>action</th>
                    </tr>
		</thead>	
		<tfoot>
                    <tr>
			<td colspan='6' class="docadd"><?php echo Yii::t('ui','New');?>
        		<textarea id="doc" style='display:none;'>       
	                      	<?php 
                        	echo $this->renderPartial('docdetial', array('model'=>new Docdetails,'form'=>$form,'i'=>'ABC')); 
                        	?>
                        </textarea>      
                        </td>
                        <td>
                                    <?php echo $form->labelEx($model,'discount'); ?>
                                    <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8)); ?>
                                    <?php echo $form->error($model,'discount'); ?>
                                    <?php echo CHTML::checkBox("Docdiscount",'', array('value'=>1, 'uncheckValue'=>0)); ?>
                       </td>
                        <td>
                                    <?php echo $form->textField($model,'discount',array('size'=>8,'maxlength'=>8,'style' => "width: 65px;")); ?>
                        </td>
                        <td>
                                    <?php //echo $form->textField($model,'vat',array('size'=>8,'maxlength'=>8,'style' => "width: 65px;")); ?>
                        </td>
                    </tr>
                    
                     <tr>
			<td colspan='6' ></td>
                        <td>
                                    <?php echo $form->labelEx($model,'sub_total'); ?>
                                    <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8)); ?>
                                    <?php echo $form->error($model,'sub_total'); ?>
                       </td>
                        <td>
                                    <div id="docsub_total"></div>
                                    <?php echo $form->hiddenField($model,'sub_total',array('size'=>8,'maxlength'=>8,'style' => "width: 65px;")); ?>
                        </td>
                        <td>
                                    <div id="docvat"></div>
                                    <?php echo $form->hiddenField($model,'vat',array('size'=>8,'maxlength'=>8,'style' => "width: 65px;")); ?>
                        </td>
                    </tr>
                    
                    
                    
                    
                    
                    <tr>
			<td colspan='6' ></td>
                        <td>
                                    <?php //echo $form->labelEx($model,'novat_total'); ?>
                                    <?php //echo $form->error($model,'novat_total'); ?>
                       </td>
                        <td>
                                    <?php //echo $form->textField($model,'novat_total',array('size'=>4,'maxlength'=>8,'style' => "width: 90px;")); ?>
                        </td>
                    </tr>
                     
                    <tr>
			<td colspan='6' ></td>
                        <td>
                                    <?php echo $form->labelEx($model,'total'); ?>
                                    <?php echo $form->error($model,'total'); ?>
                       </td>
                        <td>
                                    <div id="doctotal"></div>
                                    <?php echo $form->hiddenField($model,'total',array('size'=>8,'maxlength'=>8,'style' => "width: 65px;")); ?>
                        </td>
                    </tr>
                   
           	</tfoot>	
            	     
		<tbody class="docTarget">
		
			<?php $i=0;
			if(count($model->docDetailes)!=0)
				//$docdetails=array(new Docdetails);
			
			foreach ($model->docDetailes as $docdetail){
				echo $this->renderPartial('docdetial', array('model'=>$docdetail,'form'=>$form,'i'=>"{$i}")); 
				$i++;
			}		 ?>
                </tbody>
			
		
</table><!-- doc detiales -->
   
</div><!-- form -->	
                <?php }?>


<?php 
		if($model->docType->isrecipet){
			
			?>
<div class="form">	
<table  data-role="table" class="formtable" ><!-- docrecipet -->
	

    <thead>
                    <tr  class="head1">
                        <th><?php echo Yii::t('label','Type'); ?></th>   
                        <th><?php echo Yii::t('label','Refnum'); ?></th>
			
			<th><?php echo Yii::t('label','Credit Company'); ?></th>
			<th><?php echo Yii::t('label','Cheque No.'); ?></th>
			<th><?php echo Yii::t('label','Bank'); ?></th>
			<th><?php echo Yii::t('label','Branch'); ?></th>
			<th><?php echo Yii::t('label','Cheque Account'); ?></th>
			<th><?php echo Yii::t('label','Cheque Date'); ?></th>
                        <th><?php echo Yii::t('label','Currency'); ?></th>
			<th><?php echo Yii::t('label','Sum'); ?></th>
			<th><?php echo Yii::t('label','Bank Refnum'); ?></th>
			<th><?php echo Yii::t('label','Dep Date'); ?></th>
			
                        
                        
                        
                        
                        
                                            <th>action</th>
                    </tr>
		</thead>	
		<tfoot>
                    <tr>
			<td colspan='8' class="rcptadd"><?php echo Yii::t('ui','New');?>
        		<textarea id="rcpt" style='display:none;'>       
	                      	<?php 
                        	echo $this->renderPartial('rcptdetial', array('model'=>new Doccheques,'form'=>$form,'i'=>'ABC')); 
                        	?>
                        </textarea>      
                        </td>
                        <td>
                                   <?php echo $form->labelEx($model,'src_tax'); ?>
                                    <?php echo $form->error($model,'src_tax'); ?>
                       </td>
                        
                        <td>
                                    <?php echo $form->textField($model,'src_tax',array('size'=>8,'maxlength'=>8,'style' => "width: 65px;")); ?>
                        </td>
                    </tr>
                    <tr>
			<td colspan='8'>
        		
                        </td>
                        <td>
                                    <?php echo $form->labelEx($model,'sub_total'); ?>
                                    <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8)); ?>
                                    <?php echo $form->error($model,'sub_total'); ?>
                       </td>
                        
                        <td>
                                    <div id="rcptSum"></div><?php echo CHTML::hiddenField('rcptsum'); ?>
                        </td>
                    </tr>
           	</tfoot>	
            	     
		<tbody class="rcptTarget">
		
			<?php $i=0;
			if(count($model->docCheques)!=0)		
                            foreach ($model->docCheques as $rcptdetail){
                                    echo $this->renderPartial('rcptdetial', array('model'=>$rcptdetail,'form'=>$form,'i'=>"{$i}")); 
                                    $i++;
                            }		 ?>
                </tbody>
    
    
    
    
</table><!-- doc recipet -->
</div><!-- form -->	
<?php }?>
	<?php		
			
	
		
		
		if($model->docType->iscontract){
			echo 'contract';
		}
	?>
	<!--</div>-->
<script type="text/javascript">
		/*
		 * jQuery Calculation Plug-in
		 *
		 * Copyright (c) 2007 Dan G. Switzer, II
		 *
		 * Dual licensed under the MIT and GPL licenses:
		 *   http://www.opensource.org/licenses/mit-license.php
		 *   http://www.gnu.org/licenses/gpl.html
		 *
		 * Revision: 12
		 * Version: 0.4.08
		 *
		*/
		//(function($){var defaults={reNumbers:/(-|-\$)?(\d+(,\d{3})*(\.\d{1,})?|\.\d{1,})/g,cleanseNumber:function(v){return v.replace(/[^0-9.\-]/g,"")},useFieldPlugin:(!!$.fn.getValue),onParseError:null,onParseClear:null};$.Calculation={version:"0.4.08",setDefaults:function(options){$.extend(defaults,options)}};$.fn.parseNumber=function(options){var aValues=[];options=$.extend(options,defaults);this.each(function(){var $el=$(this),sMethod=($el.is(":input")?(defaults.useFieldPlugin?"getValue":"val"):"text"),v=$.trim($el[sMethod]()).match(defaults.reNumbers,"");if(v==null){v=0;if(jQuery.isFunction(options.onParseError))options.onParseError.apply($el,[sMethod]);$.data($el[0],"calcParseError",true)}else{v=options.cleanseNumber.apply(this,[v[0]]);if($.data($el[0],"calcParseError")&&jQuery.isFunction(options.onParseClear)){options.onParseClear.apply($el,[sMethod]);$.data($el[0],"calcParseError",false)}}aValues.push(parseFloat(v,10))});return aValues};$.fn.calc=function(expr,vars,cbFormat,cbDone){var $this=this,exprValue="",precision=0,$el,parsedVars={},tmp,sMethod,_,bIsError=false;for(var k in vars){expr=expr.replace((new RegExp("("+k+")","g")),"_.$1");if(!!vars[k]&&!!vars[k].jquery){parsedVars[k]=vars[k].parseNumber()}else{parsedVars[k]=vars[k]}}this.each(function(i,el){var p,len;$el=$(this);sMethod=($el.is(":input")?(defaults.useFieldPlugin?"setValue":"val"):"text");_={};for(var k in parsedVars){if(typeof parsedVars[k]=="number"){_[k]=parsedVars[k]}else if(typeof parsedVars[k]=="string"){_[k]=parseFloat(parsedVars[k],10)}else if(!!parsedVars[k]&&(parsedVars[k]instanceof Array)){tmp=(parsedVars[k].length==$this.length)?i:0;_[k]=parsedVars[k][tmp]}if(isNaN(_[k]))_[k]=0;p=_[k].toString().match(/\.\d+$/gi);len=(p)?p[0].length-1:0;if(len>precision)precision=len}try{exprValue=eval(expr);if(precision)exprValue=Number(exprValue.toFixed(Math.max(precision,4)));if(jQuery.isFunction(cbFormat)){var tmp=cbFormat.apply(this,[exprValue]);if(!!tmp)exprValue=tmp}}catch(e){exprValue=e;bIsError=true}$el[sMethod](exprValue.toString())});if(jQuery.isFunction(cbDone))cbDone.apply(this,[this]);return this};$.each(["sum","avg","min","max"],function(i,method){$.fn[method]=function(bind,selector){if(arguments.length==0)return math[method](this.parseNumber());var bSelOpt=selector&&(selector.constructor==Object)&&!(selector instanceof jQuery);var opt=bind&&bind.constructor==Object?bind:{bind:bind||"keyup",selector:(!bSelOpt)?selector:null,oncalc:null};if(bSelOpt)opt=jQuery.extend(opt,selector);if(!!opt.selector)opt.selector=$(opt.selector);var self=this,sMethod,doCalc=function(){var value=math[method](self.parseNumber(opt));if(!!opt.selector){sMethod=(opt.selector.is(":input")?(defaults.useFieldPlugin?"setValue":"val"):"text");opt.selector[sMethod](value.toString())}if(jQuery.isFunction(opt.oncalc))opt.oncalc.apply(self,[value,opt])};doCalc();return self.bind(opt.bind,doCalc)}});var math={sum:function(a){var total=0,precision=0;$.each(a,function(i,v){var p=v.toString().match(/\.\d+$/gi),len=(p)?p[0].length-1:0;if(len>precision)precision=len;total+=v});if(precision)total=Number(total.toFixed(precision));return total},avg:function(a){return math.sum(a)/a.length},min:function(a){return Math.min.apply(Math,a)},max:function(a){return Math.max.apply(Math,a)}}})(jQuery);
	/*
	 * jQuery extensions for xForm
	 */
        /*
	$.format = function(source, params) {
		if ( arguments.length == 1 ) 
			return function() {
				var args = $.makeArray(arguments);
				args.unshift(source);
				return $.format.apply( this, args );
			};
		if ( arguments.length > 2 && params.constructor != Array  ) {
			params = $.makeArray(arguments).slice(1);
		}
		if ( params.constructor != Array ) {
			params = [ params ];
		}
		$.each(params, function(i, n) {
			source = source.replace(new RegExp("\\{" + i + "\\}", "g"), n);
		});
		return source;
	};
	*/
	jQuery(document).ready(function(){
                $("#docs-form").submit(function() {
                    
                    if (($('#Docs_total').length)&&($('#rcptsum').length)) {
                        if(Number($('#Docs_total').val())!=Number($('#rcptsum').val())){
                          alert("sumisnot equil");
                          return false;
                        }
                    }
                });
        
		//hideEmptyHeaders();
		$(".docadd").click(function(){
                        
			var template = $('#doc').val();

                        //var i=$(".templateTarget tr").length;
                        var i=$('#doc_items').val()*1;
			template=template.replace(/ABC/g, i);

			
			$('.docTarget').append(template);
			$('#doc_items').val(i+1);
			// start specific commands
                        
                        //console.clear();
                        //console.log('lets Build');
                        //console.log($('#doc_items').val());
                        calcLines();
			// end specific commands
		});


                $(".rcptadd").click(function(){
                        
			var template = $('#rcpt').val();

                        //var i=$(".templateTarget tr").length;
                        var i=$('#rcpt_items').val()*1;
			template=template.replace(/ABC/g, i);

			
			$('.rcptTarget').append(template);
			$('#rcpt_items').val(i+1);
			// start specific commands
                        $('#Doccheques_<?php echo $i; ?>_type').val(0);
                        $('#Doccheques_<?php echo $i; ?>_type').trigger("liszt:updated");
                        
                        //console.clear();
                        //console.log('lets Build');
                        //console.log($('#rcpt_items').val());
                        rcptcalcLines();
			// end specific commands
		});
                var docacc=true;
                //var det=new Array();
                $("#Docs_account_id").focus(function(){
                    if($("#Docs_account_id").val()=='' && docacc){
                        $("#Docs_account_id").autocomplete("search","");
                        docacc=false;
                    }
                });
                


                $( "#resizable" ).resizable();
                $('.docadd').trigger('click');
                $('.rcptadd').trigger('click');
                var elements = $('tr.filters > td > [name^=Docs]');
                for (var i=0; i<elements.length; i++) {
                    elements[i].name=elements[i].name.replace("Docs","Docsfilter");
                    //console.log(elements[i].name);

                }
	});/*******************end ready*****************************/
	//function hideEmptyHeaders(){
	//	$('.templateTarget').filter(function(){return $.trim($(this).text())===''}).siblings('.templateHead').hide();
	//}
	
function refNum(id,docnum,typename){//
    
    //console.log("fire");
    $("#choseRefDoc").dialog("close"); 

    $('#Docsrefnum').html(typename+" #"+docnum);
    $('#Docs_refnum').val(id);

    return false;
    
    
}
$('#Docs_currency_id').change(function(){    
    var currency = $('#Docs_currency_id').val();
    
    $.get("<?php echo $this->createUrl('/');?>/index.php",  {"r": "Currates/Getrate" ,"id" : currency},
        function(data) {
                 $('#doc_rate').val(data);
                 var elements = $('.currSelect');
                 for (var i=0; i<elements.length; i++) {
                     index=elements[i].id.replace("Docdetails_",'').replace("_currency_id",'');
                     CalcPrice(index);
                 }

        }, "json")
        .error(function() { });

});


$('#Docs_discount').change(function(){    
    total=$('#Docs_total').val();
    discount=$('#Docs_discount').val();
    
    
    if($('#Docdiscount').attr('checked')){
        per=discount/100;
    }else{
        per=(discount/total);
    }
    
    var elements = $('[id^=Docdetails][id$=invprice]');
    //console.log(per);
    for (var i=0; i<elements.length; i++) {
        var linesum=Number($('#Docdetails_'+i+'_invprice').val());
        
        linesum=(linesum)-(linesum*per)
        $('#Docdetails_'+i+'_invprice').val(linesum);
        sumChange(i,false);
    }
    CalcPriceSum();
});



$('#Docs_total').change(function(){    
    //console.log('go');
    $('#doctotal').html($('#Docs_total').val());
});
$('#Docs_sub_total').change(function(){    
    //console.log('go');
    $('#docsub_total').html($('#Docs_sub_total').val());
});
$('#Docs_vat').change(function(){
    //console.log('go');
    $('#docvat').html($('#Docs_vat').val());
});


function currChange(index) {
    var currency = $('#Docdetails_'+index+'_currency_id').val();
    //console.log(currency);
    $.get("<?php echo $this->createUrl('/');?>/index.php",  {"r": "Currates/Getrate" ,"id" : currency},
        function(data) {
            $('#Docdetails_'+index+'_rate').val(data);
            CalcPrice(index);
        }, "json")
        .error(function() { });
        
        
}
/*
function nameChange(index) {
    var item_id = $('#Docdetails_'+index+'_name').val();
    $('#Docdetails_'+index+'_item_id').val(item_id);
    itemChange(index);      
}*/

function itemChange(index){
    var part = $('#Docdetails_'+ index +'_item_id').val();
    $.get("<?php echo $this->createUrl('/');?>/index.php",  {"r": "item/JSON" ,"id" : part},
    function(data) {
        //console.log(data[0]);
        data[0]=jQuery.parseJSON(data[0]);
        data[1]=jQuery.parseJSON(data[1]);
        $('#Docdetails_'+index+'_name').val(data[0].name);
        //$('#Docdetails_'+index+'_name').trigger("liszt:updated");
        
        $('#Docdetails_'+index+'_description').val(data[0].description);
        $('#Docdetails_'+index+'_unit_price').val(data[0].saleprice);

        $('#Docdetails_'+index+'_currency_id').val(data[0].currency_id);
        $('#Docdetails_'+index+'_currency_id').trigger("liszt:updated");
        currChange(index);

        $('#Docdetails_'+index+'_accvat').val(data[1].vat);
        
        $('#Docdetails_'+index+'_rate').val("1");
        $('#Docdetails_'+index+'_qty').focus();
    }, "json")
    .error(function() { });
}


function detChange(index){
    CalcPrice(index);
}
function vatChange(index){

    
    var linesum=Number($('#Docdetails_'+index+'_invprice').val());
    var vat=Number($('#Docdetails_'+index+'_vat').val());

    
    if($('#Docdetails_'+index+'_inclodeVat').attr('checked')){
        $('#Docdetails_'+index+'_invprice').val(linesum+vat);
    }else{
        CalcPrice(index);
    }
           
    //CalcPriceSum();
}
function sumChange(index,calc){
    calc = typeof calc !== 'undefined' ? calc : true;

    var qty = Number($('#Docdetails_'+index+'_qty').val());
    var uprice = Number($('#Docdetails_'+index+'_unit_price').val());
    var price = Number($('#Docdetails_'+index+'_price').val());
    var rate = Number($('#Docdetails_'+index+'_rate').val());
    var doc_rate = Number($('#doc_rate').val());
    var vatrate=Number($('#Docdetails_'+index+'_accvat').val());
    var linesum=Number($('#Docdetails_'+index+'_invprice').val());
    var vat=Number($('#Docdetails_'+index+'_vat').val());
    
    if($('#Docdetails_'+index+'_inclodeVat').attr('checked')){
        //console.log($('#Docdetails_'+index+'_inclodeVat'));
        vat=linesum*(vatrate/100);
        price=(linesum-vat)/(doc_rate*rate);
        uprice=price/qty;
        //console.log(uprice);
    }else{
        vat=linesum*(vatrate/100);
        price=(linesum)/(doc_rate*rate);
        uprice=price/qty;
        
    }
    
    $('#Docdetails_'+index+'_vat').val(vat);
    $('#Docdetails_'+index+'_vatlabel').html((linesum*(vat/100)).toFixed(2)+" (%"+vatrate+")");
    $('#Docdetails_'+index+'_price').val(price);
    $('#Docdetails_'+index+'_unit_price').val(uprice);
    if(calc)
        CalcPriceSum();
}

function priceChange(index){
    var qty = Number($('#Docdetails_'+index+'_qty').val());
    var uprice = Number($('#Docdetails_'+index+'_unit_price').val());
    var price = Number($('#Docdetails_'+index+'_price').val());
    var rate = Number($('#Docdetails_'+index+'_rate').val());
    var doc_rate = Number($('#doc_rate').val());
    var vatrate=Number($('#Docdetails_'+index+'_accvat').val());
    var linesum=Number($('#Docdetails_'+index+'_invprice').val());
    var vat=Number($('#Docdetails_'+index+'_vat').val());
    

    linesum=price * (rate/doc_rate);
    vat=(price*(rate/doc_rate))*(vatrate/100);
    uprice=price/qty;


    //console.log(uprice);
    
    $('#Docdetails_'+index+'_vat').val(vat);
    $('#Docdetails_'+index+'_vatlabel').html((linesum*(vat/100)).toFixed(2)+" (%"+vatrate+")");
    $('#Docdetails_'+index+'_invprice').val(linesum);
    $('#Docdetails_'+index+'_unit_price').val(uprice);
    CalcPriceSum();
}
$('input').blur(function(){

    if(this.id=='Docs_account_id'){
        var idate = $('#Docs_issue_date').val();
        $.get("<?php echo $this->createUrl('/');?>/index.php", {"r": "/accounts/JSON" ,"id": $("#Docs_account_id").val()},
            function(data) {
                $("#Docs_company").val(data.name);
                $("#Docs_address").val(data.address);
                $("#Docs_city").val(data.city);
                $("#Docs_zip").val(data.zip);
                $("#Docs_vatnum").val(data.vatnum);
                $("#Docs_currency_id").val(data.currency_id);
                $("#Docs_currency_id").trigger("liszt:updated");

                var pay_terms=data.pay_terms;
                CalcDueDate(idate, pay_terms);
            }, "json")
            .error(function() { });
    }//end account_id
	
} );

function CalcPrice(index) {
    var qty = $('#Docdetails_'+index+'_qty').val();
    var uprice = $('#Docdetails_'+index+'_unit_price').val();
    var rate = $('#Docdetails_'+index+'_rate').val();
    var doc_rate = $('#doc_rate').val();
    var vat=$('#Docdetails_'+index+'_accvat').val();
    var itemtotal;

    var price = (uprice * qty).toFixed(2);
    $('#Docdetails_'+index+'_price').val(price);
    
    
    if(rate!=doc_rate){
        itemtotal=price * (rate/doc_rate);
        
    }else{
        itemtotal=price;
        
    }

    
    $('#Docdetails_'+index+'_vat').val((itemtotal*(vat/100)).toFixed(2));
    $('#Docdetails_'+index+'_vatlabel').html((itemtotal*(vat/100)).toFixed(2)+" (%"+vat+")");
    $('#Docdetails_'+index+'_invprice').val(itemtotal);
    CalcPriceSum();
}

function calcLines(){
    var elements = $('[id^=Docdetails][id$=line]');
    //var i=1;
    
    for (var i=0; i<elements.length; i++){
        
        console.log(elements[i].id);
        $('#'+elements[i].id).val(i+1);
        //i++;
  }
       
}
function CalcPriceSum() {
    var elements = $('[id^=Docdetails][id$=invprice]');
    var selements = $('[id^=Docdetails][id$=_vat]');
    var vattotal=0;
    var subtotal=0;
    //var novat_total=0;
    for (var i=0; i<elements.length; i++) {
        //console.log(elements[i].id);
        var itemtotal=Number($('#'+elements[i].id).val());
        var vat= Number($('#'+selements[i].id).val());
        //console.log(vat);
        //console.log(selements[i].id);
        //if(vatper!=0){
        subtotal+=itemtotal;
        vattotal+=vat;
        //}else{
            //novat_total+=itemtotal;
        //}
    }
    $('#Docs_vat').val(vattotal.toFixed(2)).trigger('change');
    $('#Docs_sub_total').val(subtotal.toFixed(2)).trigger('change');
    //$('#Docs_novat_total').val(novat_total.toFixed(2));
    $('#Docs_total').val((subtotal+vattotal).toFixed(2)).trigger('change');//novat_total
}
function CalcDueDate(valdate, pay_terms) {
	var em=0;
	pay_terms=parseInt(pay_terms);
	if(pay_terms>=0){
		em=0;
	}else{
		em=1;
		pay_terms=pay_terms*-1;
	}
	//var duedate = $('#Docs_due_date');//document.form1.due_date;
	var dstr = valdate;
	var darr = dstr.split("-");
	var day = parseInt(darr[0]);
	var month = parseFloat(darr[1]);
	var year = parseInt(darr[2]);

	if(em) {	
		month += 1;
		if(month > 12) {
			month = 1;
			year += 1;
		}
		day = 1;
		
	}
	
	D = new Date(year, month - 1, day);
	D.setDate(D.getDate()+pay_terms);
	day = D.getDate();
	month = D.getMonth()+1;
	year = D.getFullYear();
	if(month >= 12) {
		month = 1;
		year += 1;
	}
	//aler
	$('#Docs_due_date').val(day + "-" + month + "-" + year);
}
/**********************************doc end******************************/

function rcptSum(){
    var elements = $('[id^=Doccheques][id$=sum]');
    var total=0;
    for (var i=0; i<elements.length; i++) {
        var item=Number($('#'+elements[i].id).val());
        total+=item;
    }
    $('#rcptSum').html((total).toFixed(2));
    $('#rcptsum').val(total);
}

function rcptcalcLines(){
    var elements = $('[id^=Doccheques][id$=line]');
    //var i=1;
    
    for (var i=0; i<elements.length; i++){
        
        console.log(elements[i].id);
        $('#'+elements[i].id).val(i+1);
        //i++;
    }
  }
</script>
<div class="form">
    <p>
        <?php echo $form->labelEx($model,'comments'); ?>
        <?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'comments'); ?>
    </p>
            
    <p>
        <!--</div>

        <div class="row buttons">-->
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <!--</div>-->
    </p>
</div><!-- form -->
<?php $this->endWidget(); ?>


<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'choseRefDoc',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Chose Refernce Documenet',
        'autoOpen'=>false,
        'width'=>'600px',
    ),
));
$dataProvider=new CActiveDataProvider('Docs');
    echo $this->renderPartial('index', array('dataProvider'=>$dataProvider,)); 

$this->endWidget('zii.widgets.jui.CJuiDialog');

?>