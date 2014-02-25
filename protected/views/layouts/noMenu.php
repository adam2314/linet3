<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        
       
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
