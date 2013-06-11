	<div class="templateContent">
		<div>
			<?php echo $form->textField($model,"[$i]id",array('size'=>10,'maxlength'=>10,'hidden'=>'hidden')); ?>
			<?php echo $form->textField($model,"[$i]doc_id",array('size'=>10,'maxlength'=>10,'hidden'=>'hidden')); ?>
			<?php echo $form->textField($model,"[$i]line",array('hidden'=>'hidden',"value"=>$i)); ?>
			<?php //echo $form->textField($model,"[$i]item_id",array('size'=>10,'maxlength'=>10));

			
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	    'value'=>$model->item_id,
	    'name'=>"Docdetails[$i][item_id]",
		//'onblur'=>"hell",
	    'source'=>$this->createUrl('item/autocomplete'),//costumer
	    // additional javascript options for the autocomplete plugin
	    'options'=>array(
	            'showAnim'=>'fold',
	    ),
	));
		
			
			
			?>
		</div>
		<div><?php echo $form->textField($model,"[$i]name",array('size'=>10,'maxlength'=>255)); ?></div>
		<div><?php echo $form->textArea($model,"[$i]description",array('rows'=>1, 'cols'=>10)); ?></div>
		<div><?php echo $form->textField($model,"[$i]qty",array('size'=>5,'maxlength'=>5)); ?></div>
		<div><?php echo $form->textField($model,"[$i]unit_price",array('size'=>8,'maxlength'=>8)); ?></div>
		<div><?php echo $form->textField($model,"[$i]currency",array('size'=>10,'maxlength'=>10)); ?></div>
		<div><?php echo $form->textField($model,"[$i]price",array('size'=>8,'maxlength'=>8)); ?></div>
		<div><?php echo $form->textField($model,"[$i]nisprice",array('size'=>8,'maxlength'=>8)); ?></div>
		
        	<div class="remove"><?php echo Yii::t('ui','Remove');?>
            	<input type="hidden" class="rowIndex" value="<?php echo $i;?>" />
            	<input id="Docdetails_<?php echo $i;?>_src_tax"type="hidden" value="" />
            	<input id="Docdetails_<?php echo $i;?>_rate"type="hidden" value="1" />
           	</div>
        <script type="text/javascript">
			/*<![CDATA[*/
			jQuery(function($) {
			jQuery('#Docdetails_<?php echo $i; ?>_item_id').autocomplete({'showAnim':'fold','source':'/yii/demos/new/index.php?r=item/autocomplete'});
			});
			/*]]>*/
		</script>
        
	</div>
