<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width" name="viewport" />
       

        
        
        
        
	<!-- blueprint CSS framework -->
<?php 
$baseUrl=Yii::app()->request->baseUrl;
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/screen.css", 'screen, projection');
Yii::app()->clientScript->registerCssFile($baseUrl. "/assets/css/print.css", 'all');
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/main.css");
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/form.css");
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/bootstrap.min.css");
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/bootstrap-responsive.min.css");
//Yii::app()->clientScript->registerCssFile($baseUrl. "/assets/css/linet.css");

Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/Font-awesome/css/font-awesome.min.css');
//Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/style.css');
//Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/calendar.css');
//Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/theme.css');
//Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/style-switcher.css');
//Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/colorpicker.css');
//Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/chosen/chosen/chosen.css');

//Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/bootstrap.min.css');
//Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/bootstrap-responsive.min.css');
//Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/bootstrap-toggle-buttons.css');

//Yii::app()->clientScript->registerCSSFile($baseUrl.'');

?>
         <meta content="Metis: Bootstrap Responsive Admin Theme" name="description">

   
     
        <link href="<?php echo $baseUrl; ?>/assets/css/linet.css" rel="stylesheet" type="text/css" />
 
                <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
                <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
                <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="assets/Font-awesome/css/font-awesome-ie7.min.css"/>
        <![endif]-->

       
  

        
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        
        
       
</head>

<body>
<!-- <div id="">-->
<div class="wrapper" id="page">
    


	<div class="navbar-inverse">
          
	<?php 
	Yii::app()->bootstrap->register();
?>

      
	</div><!-- mainmenu -->
 
	<div id="content" class="">
            

            <div class="container-fluid outer">
                
                
            
                
     <?php $this->widget('bootstrap.widgets.TbAlert'); ?>           
                
                
        
                      <?php echo $content; ?>

                    
            <?php //echo $content; ?>
            </div>
        </div>

</div><!-- page -->

</body>
</html>
