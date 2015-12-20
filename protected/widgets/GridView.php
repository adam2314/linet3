<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\widgets;
class GridView extends \kartik\grid\GridView{
    public $pjax=true;
    public $toolbar=['{export}','{toggleData}',];
    public $bordered = true;
    //public $striped = true,
    //public $condensed = true,
    public $responsive = true;
    public $hover = true;
    public $panel = [
        'type' => GridView::TYPE_PRIMARY,
        //'heading' => "table header",
    ];
    public $persistResize = false;
    
}


