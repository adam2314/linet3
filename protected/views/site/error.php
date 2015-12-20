<?php
use yii\helpers\Html;
?>

<?php
//$this->pageTitle=Yii::$app()->name . ' - '. Yii::t('app','Error');
 //app\widgets\MiniForm::begin(array(    'header' => Yii::t('app',"Error"),)); 
?>



<div class="alert in alert-block fade alert-danger">
    <h2><?php echo Yii::t('app','Error') ." ".$error->statusCode; ?></h2>
<?php echo Html::encode($error->getMessage()); 

//print_r(Yii::$app->theme);

?>
    <?= nl2br(Html::encode($error->getMessage())) ?>
    
    <a href='javascript:history.back()'><?php echo Yii::t('app','Back')?></a>
</div>

<?php //app\widgets\MiniForm::end(); ?>
