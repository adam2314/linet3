<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width" name="viewport" />

<?php 
$baseUrl=Yii::app()->request->baseUrl;

Yii::app()->clientScript->registerCssFile($baseUrl. "/assets/css/print.css", 'all');
Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/Font-awesome/css/font-awesome.min.css');


?>
        <link href="<?php echo $baseUrl; ?>/assets/css/linet.css" rel="stylesheet" type="text/css" />
 	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
      
    </head>

    <body>
        <?php echo $content; ?>
    </body>
</html>
