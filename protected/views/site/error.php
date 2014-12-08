<?php
$this->pageTitle=Yii::app()->name . ' - '. Yii::t('app','Error');
 //$this->beginWidget('MiniForm',array(    'header' => Yii::t('app',"Error"),)); 
?>



<div class="alert in alert-block fade alert-danger">
    <h2><?php echo Yii::t('app','Error') ." ".$code; ?></h2>
<?php echo CHtml::encode($message); 

//print_r(Yii::app()->theme);

?>
    <a href='javascript:history.back()'><?php echo Yii::t('app','Back')?></a>
</div>

<?php //$this->endWidget(); ?>