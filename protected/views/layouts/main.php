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
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/screen.css", 'screen, projection');
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/print.css", 'print');
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/main.css");
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/form.css");
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/bootstrap.min.css");
//Yii::app()->clientScript->registerCssFile($baseUrl. "/css/bootstrap-responsive.min.css");
//Yii::app()->clientScript->registerCssFile($baseUrl. "/assets/css/linet.css");

Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/Font-awesome/css/font-awesome.min.css');
Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/style.css');
Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/calendar.css');
Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/theme.css');
Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/style-switcher.css');
Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/colorpicker.css');
Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/chosen/chosen/chosen.css');

Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/bootstrap.min.css');
Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/bootstrap-responsive.min.css');
Yii::app()->clientScript->registerCSSFile($baseUrl.'/assets/css/bootstrap-toggle-buttons.css');

//Yii::app()->clientScript->registerCSSFile($baseUrl.'');

Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/4585c/jquery.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/jquery.mousewheel.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/jquery.tablesorter.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/jquery.sparkline.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/jquery.dualListBox-1.3.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/jquery.autosize-min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/jquery.inputlimiter.1.3.1.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/jquery.tagsinput.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/jquery.toggle.buttons.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/uniform/jquery.uniform.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/jquery.validVal-4.3.2.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/chosen/chosen/chosen.jquery.min.js');
//Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/vendor/bootstrap.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/bootstrap-colorpicker.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/bootstrap-progressbar.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/bootstrap-datepicker.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/bootstrap-timepicker.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/bootstrap-inputmask.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/prettify.js');

Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/cssbeautify.js');

Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/vendor/less-1.3.3.min.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/date.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/lib/daterangepicker.js');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/assets/js/main.js');
//Yii::app()->clientScript->registerScriptFile($baseUrl.'');

?>
         <meta content="Metis: Bootstrap Responsive Admin Theme" name="description">

   
        <link href="<?php echo $baseUrl; ?>/assets/less/theme.less" rel="stylesheet/less" type="text/css" />       
        <link href="<?php echo $baseUrl; ?>/assets/css/linet.css" rel="stylesheet" type="text/css" />
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
            array('label'=>Yii::t('app','Bussines details'), 'url'=>array('companies/update&id=0')),
            //'---',
            //array('label'=>Yii::t('app','Accounts')),
            
             
           // '---',
            array('label'=>Yii::t('app','Manual Journal Voucher'), 'url'=>array('voucher/index')),
            array('label'=>Yii::t('app','Business docs'), 'url'=>array('doctype/admin')),
            array('label'=>Yii::t('app','Costum Fields'), 'url'=>array('eavFields/admin')),
            array('label'=>Yii::t('app','Currency rates'), 'url'=>array('currates/admin')),
            array('label'=>Yii::t('app','Openning balances'), 'url'=>array('opbalance/index')),
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
        	array('label'=>Yii::t('app','Werehouses'), 'url'=>array('accounts/index','type'=>'10'),'visible'=>Yii::app()->user->checkAccess( 'accounts', array() )),
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
			array('label'=>Yii::t('app','Manage Suppliers'), 'url'=>array('accounts/contact/1')),
			array('label'=>Yii::t('app','Parchace Order'), 'url'=>array('docs/create/10')),
			array('label'=>Yii::t('app','inseret Buisness outcome'), 'url'=>array('docs/create/11')),
			array('label'=>Yii::t('app','insert Asstes outcome'), 'url'=>array('docs/create/12')),
		)),
		array('label'=>Yii::t('app','Register'), 'icon'=>'money','items'=>array(
			array('label'=>Yii::t('app','Receipt'), 'url'=>array('docs/create/8')),
			array('label'=>Yii::t('app','Bank deposits'), 'url'=>array('deposit&amp;type=2')),
			array('label'=>Yii::t('app','Payment'), 'url'=>array('payment')),
			array('label'=>Yii::t('app','VAT payment'), 'url'=>array('payment&amp;opt=vat')),
			array('label'=>Yii::t('app','Nat. Ins. payment'), 'url'=>array('payment&amp;opt=natins')),
		)),
		array('label'=>Yii::t('app','Reconciliations'), 'icon'=>'eye-open','items'=>array(
			array('label'=>Yii::t('app','Bank docs entry'), 'url'=>array('bankbook')),
			array('label'=>Yii::t('app','Bank recon.'), 'url'=>array('extmatch')),
			array('label'=>Yii::t('app','Show bank recon.'), 'url'=>array('edispmatch')),
			array('label'=>Yii::t('app','Accts. recon.'), 'url'=>array('intmatch')),
			array('label'=>Yii::t('app','Show recon.'), 'url'=>array('dispmatch')),
		)),
		array('label'=>Yii::t('app','Reports'),'icon'=>'bar-chart','items'=>array(
			array('label'=>Yii::t('app','Display transactions'), 'url'=>array('reports/journal')),
			array('label'=>Yii::t('app','Customers owes'), 'url'=>array('reports/owe')),
			array('label'=>Yii::t('app','Profit & loss'), 'url'=>array('reports/profloss')),
			array('label'=>Yii::t('app','Monthly Prof. & loss'), 'url'=>array('reports/mprofloss')),
			array('label'=>Yii::t('app','VAT calculation'), 'url'=>array('reports/vatrep')),
			array('label'=>Yii::t('app','Balance'), 'url'=>array('reports/balance')),
			array('label'=>Yii::t('app','Income tax advances'), 'url'=>array('reports/taxrep')),
		)),
		array('label'=>Yii::t('app','Import Export'), 'icon'=>'exchange','items'=>array(
			array('label'=>Yii::t('app','Open docs'), 'url'=>array('openfrmt')),
			array('label'=>Yii::t('app','Open docs Import'), 'url'=>array('openfrmtimport')),
			array('label'=>Yii::t('app','General backup'), 'url'=>array('backup')),
			array('label'=>Yii::t('app','Backup restore'), 'url'=>array('backup&amp;step=restore')),
			array('label'=>Yii::t('app','PCN874'), 'url'=>array('pcn874')),
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
            
            
            <div class="media user-media hidden-phone">
                <a class="user-link" href="">
                    <img class="media-object img-polaroid user-img" alt="" src="assets/img/user.gif">
                    <span class="label user-label">16</span>
                </a>
                <div class="media-body hidden-tablet">
                    <h5 class="media-heading">Archie</h5>
                    <ul class="unstyled user-info">
                        <li>
                            <a href="">Administrator</a>
                        </li>
                        <li>
                            Last Access :
                            <br>
                            <small>
                                <i class="icon-calendar"></i>
                                16 Mar 16:32
                            </small>
                        </li>
                    </ul>
                </div>
            </div>
            
            
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
		<p>
                  
			
		<div class="firefox"><table border="0" dir="rtl"><tr><td>
			<a href='http://www.mozilla.org/firefox?WT.mc_id=aff_en02&amp;WT.mc_ev=click'><!--<img src='images/logo_firefox.png' alt='Firefox Download Button' border='0' />--></a>
			</td><td valign="top">
			מומלץ להשתמש בתוכנה זו עם דפדפן פיירפוקס<br />
			להתקנה לחץ על הלוגו מימין</td></tr></table>
		</div>
				
		<div class="osi">
			<!--<img src="images/logo_osi2.png" alt="logo osi2" /><img src="images/logo_osi.png" alt="osi logo" />-->
		</div>
        </p>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
