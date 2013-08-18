<?php
class listbox extends string
{
    
    public $attr = array();
    public $name ='';
    public $value ='';
    
    public function init()
    {
    	//ob_start();
        //parent::init();
         
    }
 
    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run(){
	return CHtml::textField($this->name,$this->value,array('submit'=>''));
    }
}
