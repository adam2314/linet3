<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <!--<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">-->
       
            <?php 
$baseUrl=Yii::app()->request->baseUrl;
//Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl( "/css/screen.css", 'screen, projection'));
//Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl( "/css/print.css", 'print'));
//Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl( "/css/main.css"));
//Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl( "/css/form.css"));
//Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl( "/css/bootstrap.min.css"));
//Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl( "/css/bootstrap-responsive.min.css"));
//Yii::app()->clientScript->registerCssFile(Yii::app()->createAbsoluteUrl( "/assets/css/linet.css"));


Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/style.css'));

//Yii::app()->clientScript->registerScriptFile(Yii::app()->createAbsoluteUrl('/assets/4585c/jquery.js'));


?>
        <link href="<?php echo $baseUrl; ?>/assets/less/theme.less" rel="stylesheet/less" type="text/css" />       
        <style id="less:bootstrap-admin-assets-less-theme" type="text/css" ></style>
 
                <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
                <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
                <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="assets/Font-awesome/css/font-awesome-ie7.min.css"/>
        <![endif]-->

       
  

       
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
         <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->createAbsoluteUrl('/assets/css/linet.css');?>" />
        
       
</head>

<body>
    <div id="modal" class="modal hide fade in" style="display: none; ">
        <div id="modal-header" class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Modal Heading</h3>
        </div>
        <div id="modal-body" class="modal-body">
            	        
        </div>
        <div id="modal-footer" class="modal-footer">
            <a href="#" class="btn btn-success">Action</a>
            <a href="#" class="btn" data-dismiss="modal">Close</a>
        </div>
    </div>
<div class="wrapper" id="page">
    
	<div class="headerA">
		<!--<div id="right_hdr"><a href="?r=site/index"><?php echo CHtml::encode(Yii::app()->name); ?></a></div>-->
		<div class="logo">
			<!--<img alt="linet logo" src="images/logo.png" />-->
		</div>
		
	</div><!-- header -->

	<div class="navbar-inverse">
          
			<div class="navbar navbar-fixed-top"><div class="navbar-inner"><div class="container"><a href="/yii/demos/new/" class="brand"></a><ul id="yw0" class="nav"><li class="active"><a href="/yii/demos/new/site/login">הכנס</a></li></ul></div></div></div>      
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
                    <h5 class="media-heading"><?php echo Yii::app()->user->fname." ".Yii::app()->user->lname; ?></h5>
                    <ul class="unstyled user-info">
                        <li>
                            <a href=""><?php echo Yii::app()->user->username; ?></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createAbsoluteUrl('/site/Logout');?>"><?php echo Yii::t('app','Logout');?></a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createAbsoluteUrl('/company/index');?>"><?php echo Yii::t('app','Change Company');?></a>
                        </li>
                        
                        <!--<li>
                            Last Access :
                            <br>
                            
                                <i class="icon-calendar"></i>
                                16 Mar 16:32
                        </li>-->
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
