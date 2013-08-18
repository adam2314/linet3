<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	$model->id,
//);

$this->menu=array(
	array('label'=>'List Docs', 'url'=>array('index')),
	array('label'=>'Create Docs', 'url'=>array('create')),
	array('label'=>'Update Docs', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Docs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Docs', 'url'=>array('admin')),
);
 $this->beginWidget('MiniForm',array(
    'haeder' => "Accounts",
    //'width' => '800',
)); 
?>

<h1>View Docs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'prefix',
		'doctype',
		'docnum',
		'account_id',
		'company',
		'address',
		'city',
		'zip',
		'vatnum',
		'refnum',
		'issue_date',
		'due_date',
		'sub_total',
		'novat_total',
		'vat',
		'total',
		'src_tax',
		'status',
		'printed',
		'comments',
		'owner',
	),
)); 




	if($type->isdoc){
			//echo 'doc';
			$detials=new Docdetails;
			?>
	<div class="row">
		<table class="templateFrame grid" cellspacing="0">
        	<thead class="templateHead">
            	<tr>
                	<?php //echo $model->getAttributeLabel('doc_id'); ?>
					<td><?php echo $model->getAttributeLabel('item_id'); ?></td>
					<td><?php echo $model->getAttributeLabel('name'); ?></td>
					<td><?php echo $model->getAttributeLabel('description'); ?></td>
					<td><?php echo $model->getAttributeLabel('qty'); ?></td>
					<td><?php echo $model->getAttributeLabel('unit_price'); ?></td>
					<td><?php echo $model->getAttributeLabel('currency'); ?></td>
					<td><?php echo $model->getAttributeLabel('price'); ?></td>
					<td><?php echo $model->getAttributeLabel('nisprice'); ?></td>
					
                </tr>
			</thead>
			<tfoot>
            	<tr>
                	<td colspan="9">     	</td>
	            	</tr>
	         </tfoot>
            <tbody class="templateTarget">
                <?php $i=0;
				if(count($docdetails)==0)
					$docdetails=array(new Docdetails);
				
				foreach ($docdetails as $docdetail){
					echo $this->renderPartial('docdetialview', array('model'=>$docdetail,'type'=>$type,)); 
					$i++;
				}
		 ?>
            </tbody>
		</table>
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
)); ?>
 
<fieldset>
 
    <legend>Legend</legend>		
            <div class="form-actions">
		
                   
                
                            <div class="btn-group">
                        <button class="btn btn-primary">Computrized Doc</button>
                        <button class="btn btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Send email</a></li>
                            
                        </ul>
                    </div>
               
               
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Print',

		)); ?>
                <a id="clickme" href="">Change language</a>
                <?php 
                 //echo CHtml::dropDownList('lang', $select,array('he_il' => 'עברית', 'en_us' => 'English(US)'),array('empty' => '(Select a gender)'));
                echo CHtml::dropDownList(
                        'Docs', 
                        'lang', 
                        array('he_il'=>"עברית",'en_us'=>"English", ),
                        array("style"=>'display:none;')
                        );
                //echo $form->dropDownListRow($model, 'doctype', array('Something ...', '1', '2', '3', '4', '5')); 
                
                
                
                ?>
	</div>
</fieldset>   
<script style="javascript">
    $('#clickme').click(function() {
$('#Docs').show('slow');
$('#clickme').hide('slow');
return false;
});
    
    
</script>
 <?php $this->endWidget(); ?>           
            
	<?php		
			
		}
                
                
                
                $this->endWidget(); 
		?>
