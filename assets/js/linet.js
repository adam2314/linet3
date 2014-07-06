/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
//adam:
    //$(".chzn-select").chosen();

    $("select:not(.not-chzn-select)").addClass("chzn-select").chosen();//.addClass("chzn-rtl")
    //$("select:not(.not-chzn-select)").addClass("chzn-select");
    //$("select:not(.not-chzn-select)").chosen();
    // 

});

function goFull(obj) {

    //obj.requestFullScreen();
    screenfull.toggle(obj);
}//*/



