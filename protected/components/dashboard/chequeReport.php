<?php
class chequeReport extends MiniForm{
    public $logo = 'none';
    public $help = 'none';
    public $collapse=false;
    public $fullscreen=false;
     public function init()  {
        $cheques=new Doccheques('search');
//$cheques->dep_date<=today
//$cheques->status=??
//$cheques->type=cash check
$this->content=$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'depsoit-grid',
	'dataProvider'=>$cheques->search(),
        'template' => '{items}{pager}',
	'columns'=>array(
            /*
                array(
                    'type'=>'raw',
                    'value'=>
                        'CHtml::checkBox("FormDeposit[Deposit][$data->doc_id,$data->line]",null,array( "onchange"=>"CalcSum()"))',
                    ),
                array(
                    'type'=>'raw',
                     'value'=>
                        'CHtml::hiddenField("FormDeposit[Total][$data->doc_id,$data->line]","$data->sum")',
                    ),*/
                'type',
                //'bank_refnum',
		//'bank',
                //'branch',
                //'cheque_acct',
                'cheque_num',
                //'cheque_date',
                'dep_date',
		//'account_id',
		//'currency_id',
                'refnum',
		'sum',
		//'total',
		/*
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),*/
	),
),true); 
        //parent::init();
    }
    /*
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
    }*/
}




