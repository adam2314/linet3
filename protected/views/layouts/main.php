<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
        <link rel="shortcut icon" href="<?php echo Yii::app()->createAbsoluteUrl('/assets/img/favicon.ico'); ?>">
        <link rel="icon" type="image/ico" href="<?php echo Yii::app()->createAbsoluteUrl('/assets/img/favicon.ico'); ?>">        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

       
</head>

<body>
    <div id="modal" class="modal hide fade" tabindex="-1" data-width="760">
        <div id="modal-header" class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
    
<nav class="navbar navbar-inverse navbar-static-top">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="topnav">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <a data-placement="bottom" data-original-title="Show / Hide Sidebar" data-toggle="tooltip" class="btn btn-success btn-sm" id="changeSidebarPos">
                          <i class="fa fa-expand"></i>
                        </a> 
                    </div>
               </div>
            </div><!-- /.topnav -->  
          
          
          <header class="navbar-header">
            
            

            
             
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
            </button>
            
             <div class="navbar-collapse navbar-ex1-collapse collapse" style="height: 1px;">
                <?php Yii::app()->bootstrap->register();?>
                 <?php Yii::app()->tinymce->register();?>
                 <?php 
                 if(!Yii::app()->user->isGuest){
			$this->widget('bootstrap.widgets.TbMenu', array('items'=>Yii::app()->user->menu,'htmlOptions'=>array('class'=>'navbar-nav')));
                }
                 //array('label'=>Yii::t('app','Logout'), 'url'=>array('/site/Logout')),
                ?>
                
            </div>
          </header>
          
          

	</nav>
    <div class="content">
        <div id="left">
            <?php if(!Yii::app()->user->isGuest){
			
                //array('label'=>Yii::t('app','Logout'), 'url'=>array('/site/Logout')),
                ?>
            
            <div class="media user-media hidden-phone">
                
                
                <div class="topnav">
                    <div class="btn-toolbar">
                      <div class="btn-group">
                        <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                          <i class="glyphicon glyphicon-fullscreen"></i>
                        </a> 
                      </div>


                      <div class="btn-group">

                        <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                          <i class="fa fa-question"></i>
                        </a> 
                      </div>
                      <div class="btn-group">
                        <a href="<?php echo Yii::app()->createAbsoluteUrl('/site/Logout');?>" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                          <i class="fa fa-power-off"></i>
                        </a> 
                      </div>
                    </div>
                </div><!-- /.topnav -->  
                <br />
                <a class='block' href="<?php echo Yii::app()->createAbsoluteUrl('/settings/dashboard');?>">
                    <img width="100px" alt="<?php echo Yii::app()->user->settings['company.name']; ?>" src="<?php echo Yii::app()->createAbsoluteUrl("site/download/".Yii::app()->user->settings['company.logo']);?>">
                    <!--<span class="label user-label">16</span>-->
                </a>
                
                
                
                <div class="media-body hidden-tablet">
                    <!--<h5 class="media-heading"><?php echo Yii::app()->user->fname." ".Yii::app()->user->lname; ?></h5>-->
                    <ul class="unstyled user-info">
                        
                        
                        <li>
                            <a href="<?php echo Yii::app()->createAbsoluteUrl('/users/update/'.Yii::app()->user->id);?>"><?php echo Yii::app()->user->fname." ".Yii::app()->user->lname; ?></a>
                        </li>
                        <!--
                        
                        <li>
                            <a href="<?php echo Yii::app()->createAbsoluteUrl('/site/Logout');?>"><?php echo Yii::t('app','Logout');?></a>
                        </li>-->
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
</div>
	<div id="footer">
		מונע על ידי מחשוב מהיר<br>
		נכתב על ידי אדם בן חור<br>
		<a href="http://www.speedcomp.co.il/">www.speedcomp.co.il</a>
	</div>

</div><!-- page -->

</body>
</html>
