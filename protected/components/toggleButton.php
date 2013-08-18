<?php

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
                exit;
                $baseUrl=Yii::app()->request->baseUrl;
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
