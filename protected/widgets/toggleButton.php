<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class toggleButton extends CWidget{
 
    public $name = 'toggleButton';
    public $id ='toggleButton';
    public $model;
    public $field;    
        
   
     public function init(){
    	        parent::init();
     
		
 
        
    }
 
    
   
    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run(){//style="width:'.($this->width-$this->titlewidth-28).'px;"
                print_r($this->model);
                Yii::$app->end();
                $baseUrl=Yii::$app->request->baseUrl;
                $newform="
                <div id='$this->name'>
                    <input type='checkbox' checked='checked' name='$this->name' />                      
                </div>     
                <script>
                       $(function() {
                           $('#$this->name').toggleButtons({
                               label: {
                                   enabled: 'כן',
                                   disabled: 'לא',
                               },

                           });
                           //formGeneral();
                       });
                </script>
";
                
		echo $newform;
    }
    
    
    
    
}
