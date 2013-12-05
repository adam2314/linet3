<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
       
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
<!-- <div id="">-->
<div class="wrapper" id="page">
    
	<div class="headerA">
		<!--<div id="right_hdr"><a href="?r=site/index"><?php echo CHtml::encode(Yii::app()->name); ?></a></div>-->
		<div class="logo">
			<!--<img alt="linet logo" src="images/logo.png" />-->
		</div>
		
	</div><!-- header -->

	<div class="navbar-inverse">
          
	<?php 
	Yii::app()->bootstrap->register();

?>
		<?php 
		if(Yii::app()->user->isGuest){
			$menu=array(array('label'=>Yii::t('app','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest));
		}else{
			$menu=array(
                            
		//Yii::t('app', 'message to be translated')
         array('label'=>Yii::t('app','Settings'),  'icon'=>'cogs','items'=>array(//'url'=>array('site/index'),
             //array('label'=>Yii::t('app','Logout'), 'url'=>array('/site/Logout')),
            array('label'=>Yii::t('app','Bussines details'), 'url'=>array('settings/admin')),
            //'---',
            //array('label'=>Yii::t('app','Accounts')),
            
             
           // '---',
            array('label'=>Yii::t('app','Manual Journal Voucher'), 'url'=>array('transaction/create')),
            array('label'=>Yii::t('app','Business docs'), 'url'=>array('doctype/admin')),
            array('label'=>Yii::t('app','Costum Fields'), 'url'=>array('eavFields/admin')),
            array('label'=>Yii::t('app','Currency rates'), 'url'=>array('currates/admin')),
            array('label'=>Yii::t('app','Openning balances'), 'url'=>array('transaction/openbalance')),
            array('label'=>Yii::t('app','Contact Item'), 'url'=>array('condate/index')),
             array('label'=>Yii::t('app','Tax Catagory For Items'), 'url'=>array('ItemVatCat/admin')),
           //  '---',
            array('label'=>Yii::t('app','Manage Users'), 'url'=>array('users/admin')),
            array('label'=>Yii::t('app','Manage Groups'), 'url'=>array('rights/authItem/roles')),
        )),
                array('label'=>Yii::t('app','Accounts'), 'icon'=>'folder-open','items'=>array(            
                array('label'=>Yii::t('app','Accounts'), 'url'=>array('accounts/index')),
                 
                array('label'=>Yii::t('app','Account Template'), 'url'=>array('accTemplate/admin')),
                array('label'=>Yii::t('app','Account Types'), 'url'=>array('acctype/admin')),           
                            
                            
                )),                                
        array('label'=>Yii::t('app','Stock'), 'icon'=>'tag','items'=>array(
        	array('label'=>Yii::t('app','Items'), 'url'=>array('item/admin'),'visible'=>Yii::app()->user->checkAccess( 'item/admin', array() )),
        	array('label'=>Yii::t('app','Werehouses'), 'url'=>array('accounts/index','type'=>'8'),'visible'=>Yii::app()->user->checkAccess( 'accounts', array() )),
        	array('label'=>Yii::t('app','Categories'), 'url'=>array('itemcategory/admin'),'visible'=>Yii::app()->user->checkAccess( 'item/admin', array() )),
        	array('label'=>Yii::t('app','Units'), 'url'=>array('itemunit/admin'),'visible'=>Yii::app()->user->checkAccess( 'itemunit/admin', array() )),
        	array('label'=>Yii::t('app','Item Template'), 'url'=>array('items/report')),
        )),
		array('label'=>Yii::t('app','Income'), 'icon'=>'thumbs-up-alt','items'=>array(
			//array('label'=>Yii::t('app','Manage Customers'), 'url'=>array('accounts/contact','type'=>'0')),
			array('label'=>Yii::t('app','Proforma'), 'url'=>array('docs/create','type'=>'1')),
			array('label'=>Yii::t('app','Delivery doc.'), 'url'=>array('docs/create','type'=>'2')),
			array('label'=>Yii::t('app','Invoice'), 'url'=>array('docs/create','type'=>'3')),
			array('label'=>Yii::t('app','Credit inv.'), 'url'=>array('docs/create','type'=>'4')),
			array('label'=>Yii::t('app','Return doc.'), 'url'=>array('docs/create','type'=>'5')),
			array('label'=>Yii::t('app','Quote'), 'url'=>array('docs/create','type'=>'6')),
			array('label'=>Yii::t('app','Sales Order'), 'url'=>array('docs/create','type'=>'7')),
			array('label'=>Yii::t('app','Invoice receipt'), 'url'=>array('docs/create','type'=>'9')),
			
			array('label'=>Yii::t('app','Print docs.'), 'url'=>array('docs/admin')),
		)),
              
		array('label'=>Yii::t('app','Outcome'), 'icon'=>'shopping-cart','items'=>array(
			array('label'=>Yii::t('app','Manage Suppliers'), 'url'=>array('accounts/index','type'=>'1')),
			array('label'=>Yii::t('app','Parchace Order'), 'url'=>array('docs/create','type'=>'10')),
			array('label'=>Yii::t('app','insert Buisness outcome'), 'url'=>array('docs/create','type'=>'13')),
			array('label'=>Yii::t('app','insert Asstes outcome'), 'url'=>array('docs/create','type'=>'14')),
		)),
		array('label'=>Yii::t('app','Register'), 'icon'=>'money','items'=>array(
			array('label'=>Yii::t('app','Receipt'), 'url'=>array('docs/create','type'=>'8')),
			array('label'=>Yii::t('app','Bank deposits'), 'url'=>array('deposit/admin')),
			array('label'=>Yii::t('app','Payment'), 'url'=>array('outcome/create')),
			array('label'=>Yii::t('app','VAT payment'), 'url'=>array('outcome/create','type'=>'1')),
			array('label'=>Yii::t('app','Nat. Ins. payment'), 'url'=>array('outcome/create','type'=>'2')),
		)),
		array('label'=>Yii::t('app','Reconciliations'), 'icon'=>'eye-open','items'=>array(
			array('label'=>Yii::t('app','Bank docs entry'), 'url'=>array('bankbook/admin')),
			array('label'=>Yii::t('app','Bank recon.'), 'url'=>array('bankbook/extmatch')),
			array('label'=>Yii::t('app','Show bank recon.'), 'url'=>array('edispmatch')),
			array('label'=>Yii::t('app','Accts. recon.'), 'url'=>array('intmatch')),
			array('label'=>Yii::t('app','Show recon.'), 'url'=>array('dispmatch')),
		)),
		array('label'=>Yii::t('app','Reports'),'icon'=>'bar-chart','items'=>array(
			array('label'=>Yii::t('app','Display transactions'), 'url'=>array('reports/journal')),
			array('label'=>Yii::t('app','Customers owes'), 'url'=>array('reports/owe')),
			array('label'=>Yii::t('app','Profit & loss'), 'url'=>array('reports/profloss')),
			array('label'=>Yii::t('app','Monthly Prof. & loss'), 'url'=>array('reports/mprofloss')),
			array('label'=>Yii::t('app','VAT calculation'), 'url'=>array('reports/vat')),
			array('label'=>Yii::t('app','Balance'), 'url'=>array('reports/balance')),
			array('label'=>Yii::t('app','Income tax advances'), 'url'=>array('reports/taxrep')),
		)),
		array('label'=>Yii::t('app','Import Export'), 'icon'=>'exchange','items'=>array(
			array('label'=>Yii::t('app','Open docs'), 'url'=>array('data/openfrmt')),
			array('label'=>Yii::t('app','Open docs Import'), 'url'=>array('data/openfrmtimport')),
			array('label'=>Yii::t('app','General backup'), 'url'=>array('data/backup')),
			array('label'=>Yii::t('app','Backup restore'), 'url'=>array('data/restore')),
			array('label'=>Yii::t('app','PCN874'), 'url'=>array('data/pcn874')),
		)),
		array('label'=>Yii::t('app','Support'), 'icon'=>'info-sign','items'=>array(
			array('label'=>Yii::t('app','Update'), 'url'=>array('module/update/')),
			array('label'=>Yii::t('app','Paid Support'), 'url'=>array('support')),
			array('label'=>Yii::t('app','About'), 'url'=>array('about')),
			array('label'=>Yii::t('app','Bag Report'), 'url'=>array('bag')),
		)),
				//*/		
		//array('label'=>Yii::t('app','Logout ('.Yii::app()->user->name.')'), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
		//array('label'=>Yii::t('app','Logout ('.Yii::app()->user->name.')'), 'url'=>'0','items'=>array()),
		
		
    );
		
		}
                
		$menu1=array();
		foreach($menu as $key=>$value){
			$menu1[]=array(
				'class'=>'bootstrap.widgets.TbMenu',
				'items'=>array($value),
			);
		}

		//$this->widget('zii.widgets.CMenu',array('items'=>$menu)); 

$this->widget('bootstrap.widgets.TbNavbar', array('items'=>$menu1,'brand'=>''));
/*

			/*'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),*/
 

?>
      
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
