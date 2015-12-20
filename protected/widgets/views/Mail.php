<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo \yii\bootstrap\Modal::widget([//
            'id' => "mailDialog",
            'options' => array(
                'title' => \Yii::t('app', 'Send Mail'),
                'autoOpen' => false,
                'width' => '600px',
            ),
        ]);
        ?>
  
        <?php
        //\yii\bootstrap\Modal::end();

        $script = "
function getFile(url) {//only for docs
        //get file
        //post....
        
        var parms = $('#docs-form').serializeArray();
        if(url!='')
        $.post(url,parms,null,'json')
         .done(function(data) {
            console.log(data);
            if(data.status!=200){
                alert(data);
            }else{
            $('#files').html('<i class=\"glyphicon glyphicon-paperclip\"></i> '+data.body.name);
            $('#mail-files').val(data.body.id);
            }
        })
        .fail(function(data) {
            //alert(data.responseText);
            console.log(data);
        });



        //callback
        //show template

        //send mail

    }

        function getAddress() {//only for docs
        //get file
        //post....
        var url = '" . $urlAddress . "';
        var parms = {};//$('#docs-form').serializeArray();
        $.post(url, {},
                function(data) {
                    console.log(data);
                    $('#mail-to').val(data.email);
                    //callback
                    //get template
                    //doc,type

                }, 'json');

        //callback
        //show template

        //send mail

    }


    function getMailForm() {
        $.post('" . $urlMailForm . "', {'minimal': 'true'},
        function(data) {
            var fileUrl = '" . $urlFile . "';
            var actionUrl = '" . $urlAction . "';    

            //console.log(data);
            $('#mailDialog > div.modal-dialog > div.modal-content > div.modal-body').html(data);
            

            if(fileUrl!='')
                getFile(fileUrl);
            getTemplate('" . $obj . "', '" . $type . "', '" . $id . "');
            getAddress();
            if(actionUrl!='')
                getAction(actionUrl);



            //$('#mail-body').tinymce({'language': 'en', 'plugins': ['advlist autolink lists link image charmap print preview hr anchor pagebreak', 'searchreplace visualblocks visualchars code fullscreen', 'insertdatetime media nonbreaking save table contextmenu directionality', 'template paste textcolor'], 'toolbar': 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor', 'toolbar_items_size': 'small', 'image_advtab': true, 'relative_urls': false, 'spellchecker_languages': '+Русский=ru'});

        }, 'json');//

    }

    function getAction(url) {
    //get input name start action
    var elements = $('[name^=Action]');
    var arr={};
    for (var i = 0; i < elements.length; i++) {
        arr[elements[i].name]=elements[i].value;
        //console.log(elements[i].value);
    }
    //console.log(arr);
        $.post(url, arr,
        function(data) {
            //console.log(data)
            //return data;
            $('#mail-body').val($('#mail-body').val()+data.body);
        }, 'json');//
        //return '';
    }

    function getTemplate(obj, type, id) {
        $.post('" . $urlTemplate . "', {'MailTemplate': {'obj': obj, 'type': type, 'id': id}},
        function(data) {

            //console.log(data[0].subject);

            $('#mail-from').val();
            $('#mail-to').val();
            $('#mail-cc').val(data[0].cc);
            $('#mail-bcc').val(data[0].bcc);
            $('#mail-subject').val(data[0].subject);
            $('#mail-body').val(data[0].body);
            
            //getBody();
            getAction();
            

        }, 'json');//
    }

    function showMail() {
        //$('#mailDialog').dialog();
        $('#mailDialog').modal('show');
        getMailForm();
        

        return;
    }


";
        $this->registerJs($script, \yii\web\View::POS_HEAD);
        ?>