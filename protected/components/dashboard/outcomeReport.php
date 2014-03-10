<?php
class outcomeReport extends MiniForm{
    public $logo = 'none';
    public $help = 'none';
    public $collapse=false;
    public $fullscreen=false;
     public function init()  {
        $accHist=new Transactions('search');
        //type out come
        //$accHist->dt=today 00:00:00 > now > today 23:59:59
        $this->content=$this->widget('bootstrap.widgets.TbGridView',array(
                'id'=>'acchist-grid',
                'dataProvider'=>$accHist->search(),
                'template' => '{items}{pager}',
                'columns'=>array(
                        'account_id',
                        'dt',
                        'details',
                ),
        ),true); 
        //parent::init();
    }
     public function run(){//style="width:'.($this->width-$this->titlewidth-28).'px;"
                    $newform='
        <div class="'.$this->class.'">
                    <h5>'.$this->haeder.'</h5>
                <div id="div-2" class="body">
                    '.$this->content.'
                </div>
        </div>
';
                
                
		echo $newform;
    }
}




