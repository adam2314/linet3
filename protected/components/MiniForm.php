<?php
class MiniForm extends CWidget
{
 
    public $logo = 'fa fa-th-large';
    public $help = 'none';
    public $collapse=true;
    public $fullscreen=true;
    public $haeder= '';
    public $titlewidth=0;
    public $class='col-lg-12';
    public $content='';
    public $height=false;
    
    public function init() {
    	ob_start();
        parent::init();
    }
 
    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run(){//style="width:'.($this->width-$this->titlewidth-28).'px;"
    	if($this->content=='')
            $this->content = ob_get_clean();
        
        if($this->help!='none'){
            $this->help='<a class="btn btn-default" href="'.$this->help.'">'.Yii::t("app",'Help').'
                                <i class="fa fa-help"></i>
                            </a>';
        }else{
            $this->help='';
            
        }
        
        
        
        
        
        if($this->collapse){
            $this->collapse='<a href="javascript:;" class="btn btn-default btn-xs collapse-box"  data-toggle="collapse">
                          <i class="fa fa-minus"></i>
                        </a> ';
            
        }else{
            $this->collapse='';
            
        }
        
        
        if($this->height){
            $this->height='style="height:'.$this->height.'px"';
            
        }else{
            $this->height='';
            
        }
        if($this->fullscreen){
            $this->fullscreen='<a href="javascript:;" class="btn btn-default btn-xs full-box">
                          <i class="fa fa-expand"></i>
                        </a> ';
            
        }else{
            $this->fullscreen='';
            
        }
        
                    $newform='


        <div class="'.$this->class.'">
            <div class="box dark">
                <header>
                    <div class="icons">
                        <i class="'.$this->logo.'"></i>
                    </div>
                    <h5>'.$this->haeder.'</h5>
                        <div class="toolbar">
                      <nav style="padding: 8px;">
                        '.$this->help.'
                        '.$this->collapse.'
                        '.$this->fullscreen.'
                      </nav>
                    </div>
                    
                </header>
                <div ' .$this->height . ' id="div-2" class="body">
                    '.$this->content.'
                </div>
            </div>
        </div>







';
                
                
		echo $newform;
    }
}