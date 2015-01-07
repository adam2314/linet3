/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

$(function() {

    //$("select:not(.not-chzn-select)").addClass("chzn-select").chosen();//.addClass("chzn-rtl")

    $("select:not(.not-chzn-select)").select2();


    $('li.dropdown-submenu').on('click', function(event) {
        event.stopPropagation();
        $(this).siblings().removeClass('open');
        $(this).toggleClass('open');
    });

});

function goFull(obj) {

    //obj.requestFullScreen();
    screenfull.toggle(obj);
}//*/



