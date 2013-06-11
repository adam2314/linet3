<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
<?php 
$baseUrl=Yii::app()->request->baseUrl;
Yii::app()->clientScript->registerCssFile($baseUrl. "/css/screen.css", 'screen, projection');
Yii::app()->clientScript->registerCssFile($baseUrl. "/css/print.css", 'print');
Yii::app()->clientScript->registerCssFile($baseUrl. "/css/main.css");
Yii::app()->clientScript->registerCssFile($baseUrl. "/css/form.css");
Yii::app()->clientScript->registerCssFile($baseUrl. "/css/bootstrap.min.css");
Yii::app()->clientScript->registerCssFile($baseUrl. "/css/bootstrap-responsive.min.css");
Yii::app()->clientScript->registerCssFile($baseUrl. "/css/linet.css");



?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<!-- <div id="">-->
<div class="wrapper" id="page">
	<div class="headerA">
		<div id="right_hdr"><a href="?r=site/index"><?php echo CHtml::encode(Yii::app()->name); ?></a></div>
		<div class="logo">
			<img alt="linet logo" src="images/logo.png" />
		</div>
		
	</div><!-- header -->

	<div class="navBar">
	<?php 
	Yii::app()->bootstrap->register();

?>
		<?php 
		if(Yii::app()->user->isGuest){
			$menu=array(array('label'=>Yii::t('app','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest));
		}else{
			$menu=array(
		//Yii::t('app', 'message to be translated')
         array('label'=>Yii::t('app','Settings'),  'items'=>array(//'url'=>array('site/index'),
            array('label'=>Yii::t('app','Bussines details'), 'url'=>array('companies/update&id=0')),
            array('label'=>Yii::t('app','Accounts'), 'url'=>array('accounts/index')),
            array('label'=>Yii::t('app','Manual Journal Voucher'), 'url'=>array('voucher/index')),
            array('label'=>Yii::t('app','Business docs'), 'url'=>array('doctype/admin')),
            array('label'=>Yii::t('app','Currency rates'), 'url'=>array('currates/admin')),
            array('label'=>Yii::t('app','Openning balances'), 'url'=>array('opbalance/index')),
            array('label'=>Yii::t('app','Manage Users'), 'url'=>array('user/index')),
            array('label'=>Yii::t('app','Manage Groups'), 'url'=>array('rights/authItem/roles')),
        )),
        array('label'=>Yii::t('app','Stock'), 'items'=>array(
        	array('label'=>Yii::t('app','Items'), 'url'=>array('item/admin'),'visible'=>Yii::app()->user->checkAccess( 'item/admin', array() )),
        	array('label'=>Yii::t('app','Werehouses'), 'url'=>array('accounts/index','type'=>'10'),'visible'=>Yii::app()->user->checkAccess( 'accounts', array() )),
        	array('label'=>Yii::t('app','Categories'), 'url'=>array('itemcategory/admin'),'visible'=>Yii::app()->user->checkAccess( 'item/admin', array() )),
        	array('label'=>Yii::t('app','Units'), 'url'=>array('itemunit/admin'),'visible'=>Yii::app()->user->checkAccess( 'itemunit/admin', array() )),
        	array('label'=>Yii::t('app','Item Template'), 'url'=>array('items/report')),
        )),
		array('label'=>Yii::t('app','Income'), 'items'=>array(
			array('label'=>Yii::t('app','Manage Customers'), 'url'=>array('accounts/contact','type'=>'0')),
			array('label'=>Yii::t('app','Proforma'), 'url'=>array('docs/create','type'=>'1')),
			array('label'=>Yii::t('app','Delivery doc.'), 'url'=>array('docs/create','type'=>'2')),
			array('label'=>Yii::t('app','Invoice'), 'url'=>array('docs/create','type'=>'3')),
			array('label'=>Yii::t('app','Credit inv.'), 'url'=>array('docs/create','type'=>'4')),
			array('label'=>Yii::t('app','Return doc.'), 'url'=>array('docs/create','type'=>'5')),
			array('label'=>Yii::t('app','Quote'), 'url'=>array('docs/create','type'=>'6')),
			array('label'=>Yii::t('app','Sales Order'), 'url'=>array('docs/create','type'=>'7')),
			array('label'=>Yii::t('app','Invoice receipt'), 'url'=>array('docs/create','type'=>'9')),
			
			array('label'=>Yii::t('app','Print docs.'), 'url'=>array('docs/view')),
		)),
		array('label'=>Yii::t('app','Outcome'), 'items'=>array(
			array('label'=>Yii::t('app','Manage Suppliers'), 'url'=>array('accounts/contact/1')),
			array('label'=>Yii::t('app','Parchace Order'), 'url'=>array('docs/create/10')),
			array('label'=>Yii::t('app','inseret Buisness outcome'), 'url'=>array('outcome/index')),
			array('label'=>Yii::t('app','insert Asstes outcome'), 'url'=>array('outcome/index/asset')),
		)),
		array('label'=>Yii::t('app','Register'), 'items'=>array(
			array('label'=>Yii::t('app','Receipt'), 'url'=>array('accounts/contact/8')),
			array('label'=>Yii::t('app','Bank deposits'), 'url'=>array('deposit&amp;type=2')),
			array('label'=>Yii::t('app','Payment'), 'url'=>array('payment')),
			array('label'=>Yii::t('app','VAT payment'), 'url'=>array('payment&amp;opt=vat')),
			array('label'=>Yii::t('app','Nat. Ins. payment'), 'url'=>array('payment&amp;opt=natins')),
		)),
		array('label'=>Yii::t('app','Reconciliations'), 'items'=>array(
			array('label'=>Yii::t('app','Bank docs entry'), 'url'=>array('bankbook')),
			array('label'=>Yii::t('app','Bank recon.'), 'url'=>array('extmatch')),
			array('label'=>Yii::t('app','Show bank recon.'), 'url'=>array('edispmatch')),
			array('label'=>Yii::t('app','Accts. recon.'), 'url'=>array('intmatch')),
			array('label'=>Yii::t('app','Show recon.'), 'url'=>array('dispmatch')),
		)),
		array('label'=>Yii::t('app','Reports'),'items'=>array(
			array('label'=>Yii::t('app','Display transactions'), 'url'=>array('reports/journal')),
			array('label'=>Yii::t('app','Customers owes'), 'url'=>array('reports/owe')),
			array('label'=>Yii::t('app','Profit & loss'), 'url'=>array('reports/profloss')),
			array('label'=>Yii::t('app','Monthly Prof. & loss'), 'url'=>array('reports/mprofloss')),
			array('label'=>Yii::t('app','VAT calculation'), 'url'=>array('reports/vatrep')),
			array('label'=>Yii::t('app','Balance'), 'url'=>array('reports/balance')),
			array('label'=>Yii::t('app','Income tax advances'), 'url'=>array('reports/taxrep')),
		)),
		array('label'=>Yii::t('app','Import Export'), 'items'=>array(
			array('label'=>Yii::t('app','Open docs'), 'url'=>array('openfrmt')),
			array('label'=>Yii::t('app','Open docs Import'), 'url'=>array('openfrmtimport')),
			array('label'=>Yii::t('app','General backup'), 'url'=>array('backup')),
			array('label'=>Yii::t('app','Backup restore'), 'url'=>array('backup&amp;step=restore')),
			array('label'=>Yii::t('app','PCN874'), 'url'=>array('pcn874')),
		)),
		array('label'=>Yii::t('app','Support'), 'items'=>array(
			array('label'=>Yii::t('app','Update'), 'url'=>array('module/update/')),
			array('label'=>Yii::t('app','Paid Support'), 'url'=>array('support')),
			array('label'=>Yii::t('app','About'), 'url'=>array('about')),
			array('label'=>Yii::t('app','Bag Report'), 'url'=>array('bag')),
		)),
				//*/		
		array('label'=>Yii::t('app','Logout ('.Yii::app()->user->name.')'), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
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

$this->widget('bootstrap.widgets.TbNavbar', array(
    'items'=>$menu1));/*

			/*'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),*/
 

?>
	</div><!-- mainmenu -->
	
	
	<div class="contents">
	<?php //if(isset($this->breadcrumbs)):?>
		<?php //$this->widget('zii.widgets.CBreadcrumbs', array(
		//	'links'=>$this->breadcrumbs,
		//)); ?><!-- breadcrumbs -->
	<?php //endif?>
	<?php echo $content; ?>
	</div>

	<div id="footer">
		
			
		<div class="firefox"><table border="0" dir="rtl"><tr><td>
			<a href='http://www.mozilla.org/firefox?WT.mc_id=aff_en02&amp;WT.mc_ev=click'><img src='images/logo_firefox.png' alt='Firefox Download Button' border='0' /></a>
			</td><td valign="top">
			מומלץ להשתמש בתוכנה זו עם דפדפן פיירפוקס<br />
			להתקנה לחץ על הלוגו מימין</td></tr></table>
		</div>
				
		<div class="osi">
			<img src="images/logo_osi2.png" alt="logo osi2" /><img src="images/logo_osi.png" alt="osi logo" />
		</div>
			
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
