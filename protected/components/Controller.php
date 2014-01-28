<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	//public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public $layout='//layouts/single';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function init()	{
            //Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/linet.css'));
            
            
            
		Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/bootstrap.min.css'));
                Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/bootstrap-responsive.min.css'));
                Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/bootstrap-toggle-buttons.css'));
                Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/chosen/chosen/chosen.css'));
                Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/calendar.css'));
                Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/theme.css'));
                Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/style-switcher.css'));
                Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/css/colorpicker.css'));
                Yii::app()->clientScript->registerCSSFile(Yii::app()->createAbsoluteUrl('/assets/Font-awesome/css/font-awesome.min.css'));
                
                
                
                
                
                
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
		
	
		
		//Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/yourscript.js');
		return parent::init();
	}
}