<?php

/**
 * Description of widgetRefnum
 *
 * @author adam
 */
class widgetMail extends CWidget {

    public $model;
    public $urlFile='';
    public $urlAddress='';
    public $urlMailForm= '';
    public $urlTemplate='';
    public $urlAction='';

    public $obj,$id,$type;
    
    //put your code here


    public function init() {
        parent::init();
    }

    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run() {
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(//
            'id' => "mailDialog",
            'options' => array(
                'title' => Yii::t('app', 'Send Mail'),
                'autoOpen' => false,
                'width' => '600px',
            ),
        ));
        ?>
        <div id="mailForm"></div>    
        <?php
        $this->endWidget('zii.widgets.jui.CJuiDialog');

        Yii::app()->clientScript->registerScript('edit', "
function getFile() {//only for docs
        //get file
        //post....
        var url = '". $this->urlFile . "';
        var parms = $('#docs-form').serializeArray();
        $.post(url, parms)
         .done(function(data) {
            if(data.status!=200){
                alert(data.text);
            }else{
            $('#files').html('<i class=\"glyphicon glyphicon-paperclip\"></i> '+data.body.name);
            $('#Mail_files').val(data.body.id);
            }
        })
        .fail(function(data) {
            alert(data.responseText);
            console.log(data);
        });



        //callback
        //show template

        //send mail

    }

        function getAddress() {//only for docs
        //get file
        //post....
        var url = '". $this->urlAddress."';
        var parms = {};//$('#docs-form').serializeArray();
        $.post(url, {},
                function(data) {
                    console.log(data);
                    $('#Mail_to').val(data.email);
                    //callback
                    //get template
                    //doc,type

                }, 'json');

        //callback
        //show template

        //send mail

    }


    function getMailForm() {
        $.post('". $this->urlMailForm."', {'minimal': 'true'},
        function(data) {

            //console.log(data);
            $('#mailForm').html(data);
            
            getFile();
            getTemplate('".$this->obj."', '".$this->type."', '".$this->id."');
            getAddress();


            $('#Mail_body').tinymce({'language': 'en', 'plugins': ['advlist autolink lists link image charmap print preview hr anchor pagebreak', 'searchreplace visualblocks visualchars code fullscreen', 'insertdatetime media nonbreaking save table contextmenu directionality', 'template paste textcolor'], 'toolbar': 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor', 'toolbar_items_size': 'small', 'image_advtab': true, 'relative_urls': false, 'spellchecker_languages': '+Русский=ru'});

        }, 'json');//

    }

    function getAction() {
        $.post('". $this->urlAction."', {},
        function(data) {
            //console.log(data)
            //return data;
            $('#Mail_body').val($('#Mail_body').val()+data);
        }, 'json');//
        //return '';
    }

    function getTemplate(obj, type, id) {
        $.post('". $this->urlTemplate."', {'MailTemplate': {'obj': obj, 'type': type, 'id': id}},
        function(data) {

            //console.log(data[0].subject);

            $('#Mail_from').val();
            $('#Mail_to').val();
            $('#Mail_cc').val(data[0].cc);
            $('#Mail_bcc').val(data[0].bcc);
            $('#Mail_subject').val(data[0].subject);
            $('#Mail_body').val(data[0].body);
            
            //getBody();
            getAction();
            

        }, 'json');//
    }

    function showMail() {
        $('#mailDialog').dialog();
        $('#mailDialog').dialog('open');
        getMailForm();
        

        return;
    }


", CClientScript::POS_HEAD); //*/
//$this->tmp();
        //echo $newform;
    }

    function tmp() {
        
    }

}
?>
