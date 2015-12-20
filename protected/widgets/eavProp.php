<?php
/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C)  Adam Ben Hur.
 * 
 * @author adam
 * 
 * All Rights Reserved.
 * ********************************************************************************** */

/**
 * Description of eavProp
 *
 */
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\EavFields;
use yii\helpers\ArrayHelper;
class eavProp extends Widget
{
 
    public $attr = array();
    public $name ='';
    public $model;
    
    public function init()
    {
    	//ob_start();
        //parent::init();
         
    }
 
    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run(){//style="width:'.($this->width-$this->titlewidth-28).'px;"
    	//$content = ob_get_clean();
        $models = EavFields::find()->All();//array('order' => 'name')
        $list = ArrayHelper::map($models, 'id', 'name');
        $htmlOptions=array ('class'=>'eav' );
        $select=Html::dropDownList($this->name.'_E_', 0, $list, $htmlOptions );
        $select=str_replace("\n","",$select);
        $select=str_replace($this->name.'_E_',"propertiesE['+uid+']",$select);
    	
                
        return $this->render("eavProp", [
                    "name" => $this->name,
                    "select" => $select,
                    "attr" => $this->attr,
                    "model"=>$this->model
        ]);
	
		
		
		
    }
}