<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        
        
       
</head>

<body>
Fancy!
<!-- <div id="">-->
<div class="wrapper" id="page">
    
	<div class="headerA">
		<!--<div id="right_hdr"><a href="?r=site/index"><?php echo CHtml::encode(Yii::app()->name); ?></a></div>-->
		<div class="logo">
			<!--<img alt="linet logo" src="images/logo.png" />-->
		</div>
		
	</div><!-- header -->

	<div class="navbar-inverse">
          
            <?php Yii::app()->bootstrap->register();?>
            <?php $this->widget('bootstrap.widgets.TbNavbar', array('items'=>Yii::app()->user->menu,'brand'=>''));?>
      
	</div><!-- mainmenu -->
        <div id="shadowleft">
            
        </div>
        <div id="left">
            <?php if(!Yii::app()->user->isGuest){
			
                //array('label'=>Yii::t('app','Logout'), 'url'=>array('/site/Logout')),
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
                            Last Fancy Access :
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
		//$this->beginWidget('zii.widgets.CPortlet', array(
		//	'title'=>'Operations',
               //         'htmlOptions'=>array('class'=>'unstyled accordion collapse in'),
		//));
                //$this->widget('sideNavBar', array('items'=>$this->menu,'id'=>'menu'));
            
            $this->widget('zii.widgets.CMenu', array('items'=>$this->menu,'id'=>'menu','htmlOptions'=>array('class'=>'unstyled accordion collapse in'),));
            
		
		//$this->endWidget();
	?>
            
        </div>
	<div id="content" class="">
            

            <div class="container-fluid outer">
                
                
            
                
     <?php $this->widget('bootstrap.widgets.TbAlert'); ?>           
                
                
            <?php //if(isset($this->breadcrumbs)):?>
                    <?php //$this->widget('zii.widgets.CBreadcrumbs', array(
                    //	'links'=>$this->breadcrumbs,
                    //)); ?><!-- breadcrumbs -->
            <?php //endif?>
                    
                    
               
       
                      <?php echo $content; ?>

                    
            <?php //echo $content; ?>
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
