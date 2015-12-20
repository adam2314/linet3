<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Switch
 *
 * @author adam
 */
namespace app\widgets;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class Switcher extends InputWidget{
    public $onLabel = 'On';
    public $offLabel= 'Off';
    public $url='';
    //public $value=true;
    
    public function run() {
        $onValue="btn-default";
        $offValue="btn-primary active";
        
        if(!$this->model->{$this->name}){
            
            $onValue="btn-primary active";
            $offValue="btn-default";
        }
        
        return "<div class='btn-group btn-toggle'> 
                            <button data-value='1' data-url='".$this->url."' class='btn btn-xs $onValue'>$this->onLabel</button>
                            <button data-value='0' data-url='".$this->url."' class='btn btn-xs $offValue'>$this->offLabel</button>
                          </div>";
    }
    //put your code here
}
