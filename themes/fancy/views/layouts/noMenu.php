<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width" name="viewport" />
       

        
        
        
        
	<!-- blueprint CSS framework -->
<?php 
$baseUrl=Yii::app()->request->baseUrl;

Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/Font-awesome/css/font-awesome.min.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/style.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/calendar.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/theme.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/style-switcher.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/colorpicker.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/chosen/chosen/chosen.css'));

Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/bootstrap.min.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/bootstrap-responsive.min.css'));
Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/bootstrap-toggle-buttons.css'));

//Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl(''));

//Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/4585c/jquery.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/jquery.mousewheel.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/jquery.tablesorter.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/jquery.sparkline.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/jquery.dualListBox-1.3.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/jquery.autosize-min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/jquery.inputlimiter.1.3.1.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/jquery.tagsinput.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/jquery.toggle.buttons.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/uniform/jquery.uniform.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/jquery.validVal-4.3.2.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/chosen/chosen/chosen.jquery.min.js'));
//Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/vendor/bootstrap.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/bootstrap-colorpicker.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/bootstrap-progressbar.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/bootstrap-datepicker.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/bootstrap-timepicker.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/bootstrap-inputmask.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/prettify.js'));

Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/cssbeautify.js'));

Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/vendor/less-1.3.3.min.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/date.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/lib/daterangepicker.js'));
Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/js/main.js'));
//Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl(''));

?>
         <meta content="Metis: Bootstrap Responsive Admin Theme" name="description">

   
        <link href="<?php echo $baseUrl; ?>/assets/less/theme.less" rel="stylesheet/less" type="text/css" />       
        <link href="<?php echo Yii::app()->createAbsoluteUrl('/assets/css/linet.css');?>" rel="stylesheet" type="text/css" />
        <style id="less:bootstrap-admin-assets-less-theme" type="text/css" ></style>
 
                <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
                <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
                <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="assets/Font-awesome/css/font-awesome-ie7.min.css"/>
        <![endif]-->

       
  

        
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        
        
       
</head>

<body>
<div class="wrapper" id="page">
    
	<div class="headerA">
		<!--<div id="right_hdr"><a href="?r=site/index"><?php echo CHtml::encode(Yii::app()->name); ?></a></div>-->
		<div class="logo">
			<!--<img alt="linet logo" src="images/logo.png" />-->
		</div>
		
	</div><!-- header -->

	<div class="navbar-inverse">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a href="/yii/demos/new/" class="brand"></a>
                        
                    </div>
                </div>
            </div>      
	</div>
        <div id="shadowleft">
            
        </div>
        <div id="left">
            <?php if(!Yii::app()->user->isGuest){
                ?>
            
            <div class="media user-media hidden-phone">
                <a class="user-link" href="">
                    <img class="media-object img-polaroid user-img" alt="" src="<?php echo Yii::app()->createAbsoluteUrl('/assets/img/user.gif');?>">
                    <span class="label user-label">16</span>
                </a>
                <div class="media-body hidden-tablet">
                    <h5 class="media-heading">$fullname</h5>
                    <ul class="unstyled user-info">
                        <li>
                            <a href="">$username</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createAbsoluteUrl('/site/Logout');?>"><?php echo Yii::t('app','Logout');?></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createAbsoluteUrl('/company/index');?>">Change Company</a>
                        </li>
                        
                        <li>
                            Last Access :
                            <br>
                            
                                <i class="icon-calendar"></i>
                                16 Mar 16:32
                        </li>
                    </ul>
                </div>
            </div>
            
            <?php             
		}
            ?>
            <?php
            $this->widget('zii.widgets.CMenu', array('items'=>$this->menu,'id'=>'menu','htmlOptions'=>array('class'=>'unstyled accordion collapse in'),));
	?>
            
        </div>
	<div id="content" class="">
            <div class="container-fluid outer">
                <?php $this->widget('bootstrap.widgets.TbAlert'); ?>           
                <?php echo $content; ?>
            </div>
        </div>
	<div id="footer">
		מונע על ידי מחשוב מהיר<br>
		נכתב על ידי אדם בן חור<br>
		<a href="http://www.speedcomp.co.il/">www.speedcomp.co.il</a>
	</div>

</div><!-- page -->

</body>
</html>
