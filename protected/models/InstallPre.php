<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class InstallPre extends CFormModel {
        public $step=1;

        
        
	public function rules() {
		return array(
			array('type', 'required'),
		);
	}

        
        private function phpchk($str){
            if(extension_loaded($str))
                return "OK";
            else 
                return "Failed";
            
        }

         private function apachechk($str){
             $array=apache_get_modules();
            if(in_array($str,$array))
                return "OK";
            else 
                return "Failed";
            
        }
        
        private function filechk($str){
            if(is_writable($str))
                return "Writable";
            else 
                return "Denaid";
            
        }
        public function report(){
        
            //print_r(get_loaded_extensions());
            //print_r(apache_get_modules());
            $data=array(
              array('id'=>'PHP Version','value'=>phpversion()),  
              array('id'=>'PHP PDO','value'=>$this->phpchk("PDO")),
                array('id'=>'PHP Zip','value'=>$this->phpchk("zip")),
                array('id'=>'PHP CURL','value'=>$this->phpchk("curl")),
                array('id'=>'PHP PDO Mysql','value'=>$this->phpchk("pdo_mysql")),
                array('id'=>'PHP PDO Sqlite','value'=>$this->phpchk("pdo_sqlite")),
                array('id'=>'PHP OpenSSL','value'=>$this->phpchk("openssl")),
                array('id'=>'Apache mod Rewrite','value'=>$this->apachechk("mod_rewrite")),
                
                //array('id'=>'Apache mod Rewrite','value'=>$this->filechk("private/")),
                array('id'=>'file permtion','value'=>$this->filechk("index.php")),
            );


            return new CArrayDataProvider($data,
                     array(
                                    'pagination'=>array(
                                        'pageSize'=>100,
                                ),
                    )             
              );
    }
        
        
        
	public function attributeLabels() {
		return array(
			'answer'=>'What type of pet(s) do you have?',
		);
	}

	public function getForm() {
            $php_version=phpversion();
            
            
		return new CForm(array(
			'showErrorSummary'=>true,
			'attributes'=>array('id'=>'install'),
			'elements'=>array(
				'php_version'=>array(
					//'type'=>'radiolist',
					//'items'=>array('Dog'=>'Dog','Cat'=>'Cat','Dog and Cat'=>'Both','Neither'=>'Neither'),
					'layout'=>'{label}<br/>{input}<br/>{error}'
				),
			),
			'buttons'=>array(
				'submit'=>array(
					'type'=>'submit',
					'label'=>'Next'
				)
			)
		), $this);
	}
}