<?php
use app\models\Currecies;
$this->params["breadcrumbs"]=array(
	'Currates'=>array('index'),
	'Manage',
);

$this->params["menu"]=array(
	//array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Currency Rate'), 'url'=>array('create')),
);
?>


<?php  app\widgets\MiniForm::begin(array('header' => Yii::t('app',"Manage Currencies Rates"),)); ?>

<?php 
$dateisOn = kartik\datecontrol\DateControl::widget(['model' => $model,'attribute' => 'from','type' => 'date']) .
        kartik\datecontrol\DateControl::widget(['model' => $model,'attribute' => 'to','type' => 'date']);
?>



<?php 
echo app\widgets\GridView::widget( array(
	'id'=>'currates-grid',
	'dataProvider'=>$model->dp(),
        //'template' => '{items}{pager}',
	//'filter'=>$model,
        //'ajaxUpdate'=>true,
        //'ajaxType'=>'POST',
     //'afterAjaxUpdate'=>"function() {
				//		jQuery('#Currates_from').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::$app->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::$app->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
				//		jQuery('#Currates_to').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['".substr(Yii::$app->language,0,2)."'], {'showAnim':'fold','dateFormat':'".Yii::$app->locale->getDateFormat('short')."','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                //}",
    
    
	'columns'=>array(
		//'id',
		
                array(
                    'attribute' => 'currency_id',
                    'filter'=>\yii\helpers\ArrayHelper::map(Currecies::find()->All(), 'id', 'name'),
                    // 'value' => 'isset($data->Currency)?$data->Currency->name:0',   //where name is Client model attribute 
                   ),
		 array(
                    'attribute'=>'date',
                     //'filter' => $dateisOn,
                    //'value'=>'$data->date'
                ),
		'value',
		/*array(
			'class'=>'yii\grid\ActionColumn',
                        'template'=>'{display}',
                        'edit' => array(
                                
                            'display' => array(
                                'label'=>'<i class="glyphicon glyphicon-transfer"></i>',
                                'url'=>'yii\helpers\BaseUrl::base().("accounts/transaction", array("id"=>$data->id))',
                                //'visible'=>'$data->score > 0',
                                'click'=>'function(){alert("Going down!");}',
                            ),
		),*/
	),
)); 


 app\widgets\MiniForm::end(); 

?>
