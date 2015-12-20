<?php
use yii\helpers\Html;
?>

<?php
//$this->pageTitle=Yii::$app()->name . ' - '. Yii::t('app','Error');
 //app\widgets\MiniForm::begin(array(    'header' => Yii::t('app',"Error"),)); 
?>



<div class="alert in alert-block fade alert-danger">
    <h2><?php echo Yii::t('app','Error') ." ".$exception->statusCode; ?></h2>
    
<div>
<?php //var_dump($exception);?>
<?php echo Html::encode( $exception->getMessage()); 
//echo Html::encode( $exception->message); 
//print_r(Yii::$app->theme);

?>
    <?= nl2br(Html::encode($message)) ?>
    </div>
    <a href='javascript:history.back()' class="btn btn-danger"><?php echo Yii::t('app','Back')?></a>
</div>

<?php //app\widgets\MiniForm::end(); ?>
