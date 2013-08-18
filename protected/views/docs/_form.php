

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docs-form',
	'enableAjaxValidation'=>false,
)); 

Currates::model()->GetRateList();

?>
<div class="form">
	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model,"doctype"); ?>
	
<div class="span4"><!--block-->
	<p>
		<?php echo $form->labelEx($model,'account_id'); ?>
		<?php 
		
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	    'name'=>'Docs[account_id]',
		'id'=>'Docs_account_id',
	    'value'=>"$model->account_id",
	    'source'=>$this->createUrl('/accounts/autocomplete',array('type'=>Acctype::model()->getType('customers'))),
		//'source'=>'/accounts/autocomplete&type='.Acctype::model()->getType('outcomes'),
	    // additional javascript options for the autocomplete plugin
	    'options'=>array(
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
            <?php echo $form->dropDownList($model,'status',$docStatuss);?>
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
		<?php echo $form->textField($model,'refnum',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'refnum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issue_date'); ?>
		<?php $model->issue_date=date('d-m-Y');
		echo $form->textField($model,'issue_date',array('')); ?>
		<?php echo $form->error($model,'issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'due_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(     // you must specify name or model/attribute
	        'name'=>'Docs[due_date]',
			'value'=>$model->due_date,
	       	 )
	        );?>
		<?php echo $form->error($model,'due_date'); ?>
	</div>
    </div>
</div><!-- form -->
	
<table  data-role="table" class="formtable" ><!-- docdetalies -->
	<?php 
		if($type->isdoc){
			
			?>
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
                                            <th style="width: 90px;"><?php echo $form->labelEx($model,'nisprice'); ?></th>
                                            <th>action</th>
                    </tr>
		</thead>	
		<tfoot>
                    <tr>
			<td colspan='6' class="add"><?php echo Yii::t('ui','New');?>
        		<textarea id="template" style='display:none;'>       
	                      	<?php 
                        	echo $this->renderPartial('docdetial', array('model'=>new Docdetails,'type'=>$type,'form'=>$form,'i'=>'ABC')); 
                        	?>
                        </textarea>      
                        </td>
                        <td>
                                    <?php echo $form->labelEx($model,'sub_total'); ?>
                                    <?php //echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8)); ?>
                                    <?php echo $form->error($model,'sub_total'); ?>
                       </td>
                        <td>
                                    <?php echo $form->textField($model,'sub_total',array('size'=>8,'maxlength'=>8)); ?>
                        </td>
                    </tr>
                    <tr>
			<td colspan='6' ></td>
                        <td>
                                    <?php echo $form->labelEx($model,'novat_total'); ?>
                                    <?php echo $form->error($model,'novat_total'); ?>
                       </td>
                        <td>
                                    <?php echo $form->textField($model,'novat_total',array('size'=>8,'maxlength'=>8)); ?>
                        </td>
                    </tr>
                     <tr>
			<td colspan='6' ></td>
                        <td>
                                    <?php echo $form->labelEx($model,'vat'); ?>
                                    <?php echo $form->error($model,'vat'); ?>
                       </td>
                        <td>
                                    <?php echo $form->textField($model,'vat',array('size'=>8,'maxlength'=>8)); ?>
                        </td>
                    </tr>
                    <tr>
			<td colspan='6' ></td>
                        <td>
                                    <?php echo $form->labelEx($model,'total'); ?>
                                    <?php echo $form->error($model,'total'); ?>
                       </td>
                        <td>
                                    <?php echo $form->textField($model,'total',array('size'=>8,'maxlength'=>8)); ?>
                        </td>
                    </tr>
                    <tr>
			<td colspan='6' ></td>
                        <td>
                                    <?php echo $form->labelEx($model,'src_tax'); ?>
                                    <?php echo $form->error($model,'src_tax'); ?>
                       </td>
                        <td>
                                    <?php echo $form->textField($model,'src_tax',array('size'=>8,'maxlength'=>8)); ?>
                        </td>
                    </tr>
           	</tfoot>	
            	     
		<tbody class="templateTarget">
		
			<?php $i=0;
			if(count($model->docDetailes)!=0)
				//$docdetails=array(new Docdetails);
			
			foreach ($model->docDetailes as $docdetail){
				echo $this->renderPartial('docdetial', array('model'=>$docdetail,'type'=>$type,'form'=>$form,'i'=>"{$i}")); 
				$i++;
			}		 ?>
                </tbody>
			
		
</table><!-- doc detiales -->
	       
			
	<?php		
			
		}
		
		if($type->isrecipet){
			echo 'recipet';
		}
		if($type->iscontract){
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
		(function($){var defaults={reNumbers:/(-|-\$)?(\d+(,\d{3})*(\.\d{1,})?|\.\d{1,})/g,cleanseNumber:function(v){return v.replace(/[^0-9.\-]/g,"")},useFieldPlugin:(!!$.fn.getValue),onParseError:null,onParseClear:null};$.Calculation={version:"0.4.08",setDefaults:function(options){$.extend(defaults,options)}};$.fn.parseNumber=function(options){var aValues=[];options=$.extend(options,defaults);this.each(function(){var $el=$(this),sMethod=($el.is(":input")?(defaults.useFieldPlugin?"getValue":"val"):"text"),v=$.trim($el[sMethod]()).match(defaults.reNumbers,"");if(v==null){v=0;if(jQuery.isFunction(options.onParseError))options.onParseError.apply($el,[sMethod]);$.data($el[0],"calcParseError",true)}else{v=options.cleanseNumber.apply(this,[v[0]]);if($.data($el[0],"calcParseError")&&jQuery.isFunction(options.onParseClear)){options.onParseClear.apply($el,[sMethod]);$.data($el[0],"calcParseError",false)}}aValues.push(parseFloat(v,10))});return aValues};$.fn.calc=function(expr,vars,cbFormat,cbDone){var $this=this,exprValue="",precision=0,$el,parsedVars={},tmp,sMethod,_,bIsError=false;for(var k in vars){expr=expr.replace((new RegExp("("+k+")","g")),"_.$1");if(!!vars[k]&&!!vars[k].jquery){parsedVars[k]=vars[k].parseNumber()}else{parsedVars[k]=vars[k]}}this.each(function(i,el){var p,len;$el=$(this);sMethod=($el.is(":input")?(defaults.useFieldPlugin?"setValue":"val"):"text");_={};for(var k in parsedVars){if(typeof parsedVars[k]=="number"){_[k]=parsedVars[k]}else if(typeof parsedVars[k]=="string"){_[k]=parseFloat(parsedVars[k],10)}else if(!!parsedVars[k]&&(parsedVars[k]instanceof Array)){tmp=(parsedVars[k].length==$this.length)?i:0;_[k]=parsedVars[k][tmp]}if(isNaN(_[k]))_[k]=0;p=_[k].toString().match(/\.\d+$/gi);len=(p)?p[0].length-1:0;if(len>precision)precision=len}try{exprValue=eval(expr);if(precision)exprValue=Number(exprValue.toFixed(Math.max(precision,4)));if(jQuery.isFunction(cbFormat)){var tmp=cbFormat.apply(this,[exprValue]);if(!!tmp)exprValue=tmp}}catch(e){exprValue=e;bIsError=true}$el[sMethod](exprValue.toString())});if(jQuery.isFunction(cbDone))cbDone.apply(this,[this]);return this};$.each(["sum","avg","min","max"],function(i,method){$.fn[method]=function(bind,selector){if(arguments.length==0)return math[method](this.parseNumber());var bSelOpt=selector&&(selector.constructor==Object)&&!(selector instanceof jQuery);var opt=bind&&bind.constructor==Object?bind:{bind:bind||"keyup",selector:(!bSelOpt)?selector:null,oncalc:null};if(bSelOpt)opt=jQuery.extend(opt,selector);if(!!opt.selector)opt.selector=$(opt.selector);var self=this,sMethod,doCalc=function(){var value=math[method](self.parseNumber(opt));if(!!opt.selector){sMethod=(opt.selector.is(":input")?(defaults.useFieldPlugin?"setValue":"val"):"text");opt.selector[sMethod](value.toString())}if(jQuery.isFunction(opt.oncalc))opt.oncalc.apply(self,[value,opt])};doCalc();return self.bind(opt.bind,doCalc)}});var math={sum:function(a){var total=0,precision=0;$.each(a,function(i,v){var p=v.toString().match(/\.\d+$/gi),len=(p)?p[0].length-1:0;if(len>precision)precision=len;total+=v});if(precision)total=Number(total.toFixed(precision));return total},avg:function(a){return math.sum(a)/a.length},min:function(a){return Math.min.apply(Math,a)},max:function(a){return Math.max.apply(Math,a)}}})(jQuery);
	/*
	 * jQuery extensions for xForm
	 */
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
	
	jQuery(document).ready(function(){
		//hideEmptyHeaders();
		$(".add").click(function(){

			var template = $('#template').val();
			//var place = $(this).parents(".templateFrame:first").children(".templateTarget");
                        //alert($(".templateTarget tr").length);
			//var i = place.find(".templateContent").length>0 ? place.find(".templateContent").max()+1 : 0;
                        var i=$(".templateTarget tr").length;
			template=template.replace(/ABC/g, i);

			
			$('.templateTarget').append(template);
			
			// start specific commands

			// end specific commands
		});

		$(".remove").live("click", function() {
			$(this).parents(".templateContent:first").remove();
			//hideEmptyHeaders();
		});
		
	});
	//function hideEmptyHeaders(){
	//	$('.templateTarget').filter(function(){return $.trim($(this).text())===''}).siblings('.templateHead').hide();
	//}
	
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
<script type="text/javascript">
var curMain=1;
var curDoc=1;
var curAcc=1;

$('input').live('blur', function($this){
	console.log(this.id);
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
	var index=this.id.replace(/Docdetails_\d+_item_id/gi,'godet');
	if(index=='godet'){
                
                //return;
		index=this.id.replace("Docdetails_",'').replace("_item_id",'');
                //alert( this.id);
		var part = $('#Docdetails_'+ index +'_item_id').val();
		$.get("<?php echo $this->createUrl('/');?>/index.php",  {"r": "item/JSON" ,"id" : part},
				function(data) {
					index=index.replace("Docdetails_",'').replace("_item_id",'');
					$('#Docdetails_'+index+'_name').val(data.name);
					$('#Docdetails_'+index+'_description').val(data.description);
					$('#Docdetails_'+index+'_unit_price').val(data.saleprice);
                                        
					$('#Docdetails_'+index+'_currency_id').val(data.currency_id);
                                        $('#Docdetails_'+index+'_currency_id').trigger("liszt:updated");
                                        
					$('#Docdetails_'+index+'_src_tax').val(data.src_tax);
					$('#Docdetails_'+index+'_rate').val("1");
					//$('#Docdetails_'+index+'_price').val(unit_price*qty);
					//$('#Docdetails_'+index+'_nisprice').val(price*currate);
					$('#Docdetails_'+index+'_qty').focus();
				}, "json")
				.error(function() { });



	}
	index=this.id.replace(/Docdetails_\d+_qty/gi,'calc');
	if(index=='calc'){
		index=this.id.replace("Docdetails_",'').replace("_qty",'');
		CalcPrice(index);

	}
	/*index=this.id.replace(/Docdetails_\d+_currency/gi,'calc');
	if(index=='calc'){
		index=this.id.replace("Docdetails_",'').replace("_currency",'');
		CalcPrice(index);

	}*/
	index=this.id.replace(/Docdetails_\d+_unit_price/gi,'calc');
	if(index=='calc'){
		index=this.id.replace("Docdetails_",'').replace("_unit_price",'');
		CalcPrice(index);

	}
} );
function CalcPrice(index) {
	var qty = $('#Docdetails_'+index+'_qty').val();
	var uprice = $('#Docdetails_'+index+'_unit_price').val();
	var rate = $('#Docdetails_'+index+'_rate').val();
	var price = (uprice * qty).toFixed(2);
	$('#Docdetails_'+index+'_price').val(price);
	$('#Docdetails_'+index+'_nisprice').val((price * rate).toFixed(2));
	CalcPriceSum();
}
function CalcPriceSum() {
	var elements = $('[id^=Docdetails]');
	var selements = $('[id^=Docdetails]');
	var vattotal=0;
	var subtotal=0;
	var novat_total=0;
	var vat=<?php echo Config::model()->findByPk('vat')->value;?>;
	for (var i=0; i<elements.length; i++) {
		var itemtotal=parseFloat($('#'+elements[i].id).val());
		var vatper= parseFloat($('#'+selements[i].id).val());
		if(vatper!=0){
			subtotal+=itemtotal;
			vattotal+=itemtotal*(vat/100);
		}else{
			novat_total+=itemtotal;
		}
	}
	$('#Docs_vat').val(vattotal.toFixed(2));
	$('#Docs_sub_total').val(subtotal.toFixed(2));
	$('#Docs_novat_total').val(novat_total.toFixed(2));
	$('#Docs_total').val((subtotal+novat_total+vattotal).toFixed(2));
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
$(function() {
	$( "#resizable" ).resizable();
});
</script>

</div><!-- form -->
<?php $this->endWidget(); ?>

