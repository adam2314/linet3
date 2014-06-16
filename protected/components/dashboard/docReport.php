<?php
class docReport extends MiniForm{
    public $logo = 'none';
    public $help = 'none';
    public $collapse=false;
    public $fullscreen=false;
     public function init()  {
        $docs=new Docs('search');
        //$docs->=status=?? open??
        $this->content=$this->widget('bootstrap.widgets.TbGridView', array(
                'id'=>'docs-grid',
                'dataProvider'=>$docs->search(),
                'template' => '{items}{pager}',
                'columns'=>array(

                        /*array(
                                'name'=>'doctype',
                                //'filter'=>CHtml::listData(Doctype::model()->findAll(), 'id', 'name'),
                                'value'=>'isset($data->docType)?$data->docType->name:""'
                        ),*/
                    /*
                        array(
                            'name'=>'docnum', 
                            'value'=>'CHtml::link(CHtml::encode($data->docnum),"#", array(  "onclick"=>\'refNum("\'.$data->id.\'","\'.$data->docnum.\'","\'.$data->docType->name.\'")\',))',
                            'type'=>'raw',



                        ),*/
                        'company',
                        //array(  'onclick'=>""refNum(\"".$data->id.",".$data->docnum.",".$data->docType->name.")",
                        /*array(
                                //'name'=>'account_id',
                                'header'=>'Account',
                                'class'=>'CLinkColumn',
                                //'filter'=>CHtml::listData(Doctype::model()->findAll(), 'id', 'name'),
                                'labelExpression'=>'"".$data->company',
                                 //'url'=>'accouts/view&id=$data->account_id',
                                  'urlExpression'=>'"users/view&id=".$data->account_id',
                        ),*/
                    
                    /*
                        array(
                                'name'=>'status',
                                'value' => 'isset($data->docStatus)?$data->docStatus->name:""'

                        ),*/

                        'total',

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




