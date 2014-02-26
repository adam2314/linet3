<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="UTF-8">

<?php 
$baseUrl=Yii::app()->request->baseUrl;

        Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/print.css'));
        Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/lib/Font-Awesome/css/font-awesome.min.css'));
        Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/2f2fedc0/jquery.js');
        Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/linet.css'));

?>
 	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
      
    </head>

    <body>
        <?php echo $content; ?>
    </body>
</html>
