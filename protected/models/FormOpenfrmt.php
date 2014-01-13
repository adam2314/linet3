<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormOpenfrmt
 *
 * @author adam
 */
class FormOpenfrmt extends CFormModel{
    public $year;
    public $from_date;
    public $to_date;
    
    private $id;
    private $line=1;

    private $iniArr;
    private $docArr;
    private $docSumArr;
    
    public $bkmvId;
    public $iniId;
            
    
    public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('to_date, from_date, year', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('to_date, from_date, year', 'safe', 'on'=>'search'),
		);
	
    
    
    }
    
    private function sortBkmvFile($data=2){
        $yiiBasepath=Yii::app()->basePath;
        $configPath=Yii::app()->user->settings["company.path"];
     
        $bkmv = $yiiBasepath."/files/".$configPath."/openformt/bkmvdata.txt";
        //$bkmv='';
        if ($fp = fopen($bkmv, 'r')) {
                $A100='';
		$Z900='';
		$fhB100 = fopen($bkmv."b100", 'w') or die("can't open file");
		$fhB110 = fopen($bkmv."b110", 'w') or die("can't open file");
		$fhC100 = fopen($bkmv."c100", 'w') or die("can't open file");
		$fhD110 = fopen($bkmv."d110", 'w') or die("can't open file");
		$fhD120 = fopen($bkmv."d120", 'w') or die("can't open file");
		$fhM100 = fopen($bkmv."m100", 'w') or die("can't open file");
		//$data=$_REQUEST['data'];
		while ($line = fgets($fp)) {
			switch (substr($line,0,4)){
				case "A100":
					$A100=$line;
					break;
				case "B110":
					fwrite($fhB110, $line);
					break;
				case "B100":
					if ($data>=2)
						fwrite($fhB100, $line);
					break;
				case "C100":
					if ($data>=2)
						fwrite($fhC100, $line);
					break;
				case "D110":
					if ($data>=2)
						fwrite($fhD110, $line);
					break;
				case "D120":
					if ($data>=2)
						fwrite($fhD120, $line);
					break;
				case "M100":
					if ($data>=1)
						fwrite($fhM100, $line);
					break;
				case "Z900":
					$Z900=$line;
					break;
			}
		}//end while and file
		fclose($fhB100);
		fclose($fhB110);
		fclose($fhC100);
		fclose($fhD110);
		fclose($fhD120);
		fclose($fhM100);
		
		$fh = fopen($bkmv."-sorted", 'w') or die(_("can't open file"));

		fwrite($fh, $A100);
		
		$fp = fopen($bkmv."b110", 'r');
		while ($line = fgets($fp)) 
			fwrite($fh, $line);
		fclose($fp);
		$fp = fopen($bkmv."c100", 'r');
		while ($line = fgets($fp)) 
			fwrite($fh, $line);
		fclose($fp);
		$fp = fopen($bkmv."d110", 'r');
		while ($line = fgets($fp)) 
			fwrite($fh, $line);
		fclose($fp);
		$fp = fopen($bkmv."d120", 'r');
		while ($line = fgets($fp)) 
			fwrite($fh, $line);
		fclose($fp);
		$fp = fopen($bkmv."m100", 'r');
		while ($line = fgets($fp)) 
			fwrite($fh, $line);
		fclose($fp);
		$fp = fopen($bkmv."b100", 'r');
		while ($line = fgets($fp)) 
			fwrite($fh, $line);
		fclose($fp);
		unlink($bkmv."b100");
		unlink($bkmv."m100");
		unlink($bkmv."d120");
		unlink($bkmv."d110");
		unlink($bkmv."c100");
		unlink($bkmv."b110");
		
		fwrite($fh, $Z900);
		fclose($fh);
		
	}else{
		print _("must die unable to sort data");
		die;
	}
        
        
    }
    
    
    private function createCompany(){
        
        
    }
    
    
    private function readline($line, $type){
        
            //get all fields (b110) sort by id
            $criteria=new CDbCriteria;
            $criteria->condition="type_id = :type_id";
            $criteria->params=array(':type_id' => $type);
            $fields= OpenFormat::model()->findAll($criteria);
            
            
            $pos=0;
            $object=array();
            $first=true;
            foreach ($fields as $field) {
                $str=mb_substr($line,$pos,$field->size,"utf-8");
                $pos+=$field->size;
                if($this->fieldvalid($str,$field->type)){
                        if (($field->import!="??") && ($field->import!="NA")){
                                if ($first){
                                        $first=false;
                                }else{
                                        $object[$field->import]=$this->fieldvalue($str,$field->type,$field->import);
                                }
                        }
                        //store field into var
                }else{
                        return false;
                }
            }
            return $object;
    }
    
    private function fieldvalue($str,$type,$action){
	switch ($type){
		case "date":
			return substr($str,0,4)."-".substr($str,4,2)."-".substr($str,6,2);
			break;
		case "hour":
			return $str;
			break;
		case "v99":
			$a=substr($str,0,1);
			$str=substr($str,1)/100;
			return number_format($str, 2, '.', '');;
			break;
		case "v9999":
			$a=substr($str,0,1);
			$str=substr($str,1)/1000;
			return number_format($str, 4, '.', '');
			break;
		case "s":
			return ltrim( $str , ' 0!'  ); //iconv("windows-1255","utf-8",$str);
			break;
		case "n":
			$str=ltrim( $str , ' 0!'  );
			return (int)$str;
			break;
		default:
			return ltrim( $str , ' 0!'  );
	}
    }
    private function fieldvalid($str,$type){
	return true;
	//chek aginst type
	
    }
    /*
function typeline($str, $filter){	
	foreach ($filter as $key=>$value){
			if ($str==$key)
				return $key;
		}
		return "UNKO";//need to stop from entring readline
}*/
    
    public function read(){
        //sort
        //$this->sortBkmvFile(); //skip for testing
        //
        //new company
        //get perm from ini
        //if (substr($line,395,1)=='2')
        //    $encoding="ibm862";
        //else 
            $encoding="windows-1255";
        
        
        
        
        $yiiBasepath=Yii::app()->basePath;
        $configPath=Yii::app()->user->settings["company.path"];
        $bkmv = $yiiBasepath."/files/".$configPath."/openformt/bkmvdata.txt-sorted";
        
        
        $suc=array();
        $suc['B110']=0;
        $suc['A100']=0;
        $suc['B100']=0;
        
        
        $analze=array();
        $analze['B110']=0;
        $analze['A100']=0;
        $analze['B100']=0;
        
        $accIndex=array();
        
        //DELETE FROM `qwe_accounts` WHERE `id`>=250
        
        if ($fp = fopen($bkmv, 'r')) {
		while ($line = fgets($fp)) {
                        
			//$line=iconv($encoding,"UTF-8",$line);
			$type=substr($line,0,4);
			$obj=$this->readline($line,$type);
			
			
			if (!$obj){
				$suc[$type]--;
			}else{
				//foreach ($obj as &$value)
				//	if ($encoding=="ibm862") 
				//		$value = iconv("ISO-8859-8", "UTF-8", hebrev(iconv("UTF-8", "ISO-8859-8", $value)));
				
				if ($type=='B110'){//Acc Haeder
					/* Account Import */
					$acc=new Accounts;
					$obj["type"]=(int)$obj["type"]+50;					
					if(isset($accTypeIndex[$obj["type"]]))
							$accTypeIndex[$obj["type"]]=$accTypeIndex[$obj["type"]].",".$obj["name"];
						else 
							$accTypeIndex[$obj["type"]]=$obj["typedesc"].":".$obj["name"];
					unset($obj["typedesc"]);
					//1405 acc type code
					//1406 acc type name
                                        //print_r($obj);//exit;
					foreach($obj as $action=>$value){
                                                //if(property_exists(new Accounts,$key)){
                                                //    print $key;
                                                $acc->openfrmtFieldValue($action,$value);
                                                    
                                                    
                                                //}
					}
					//print_r($acc);
					$accIndex[$obj["id"]]=$acc->save();
					//get new acc index save old
					unset($acc);
					
				}
				if ($type=='C100'){//Doc Haeder
                                    return "done!";
                                    exit;
					//find type
					global $DocOpenType;

					if ((isset($DocOpenType[$obj['doctype']])) && (isset($accIndex[$obj['account']]))){
						$obj['doctype']=$DocOpenType[$obj['doctype']];
						$doc=new document($obj['doctype']);
						$stype=$obj['doctype'];
						foreach($obj as $key=>$value){
							$doc->$key=$value;//print "$key <br />";
						}
						$doc->account=$accIndex[$doc->account];
						//search for old acc index
						if (isset($doc->rcptdetials)) unset($doc->rcptdetials);
						if (isset($doc->docdetials)) unset($doc->docdetials);
						
						if($check){
							if((strtotime($doc->issue_date)>$begindmy)&&(strtotime($doc->issue_date)<$enddmy))
								$docIndex[$stype.$obj["docnum"]]=$doc->newDocument();
							//print "we are chking!";
						}else{
							$docIndex[$stype.$obj["docnum"]]=$doc->newDocument();
						}
						//get new doc index save old
						unset($doc);
					}
				}
				if ($type=='D110'){//Doc Detial
					global $DocOpenType;
					$stype=$DocOpenType[$obj['doctype']];
					//print_r($obj);
					if (isset($docIndex[$stype.$obj["num"]])){		
						$docdetial=new documentDetail;
						$docdetial->price=$obj['price'];
						unset($obj['doctype']);
						unset($obj['price']);
						
						foreach($obj as $key=>$value){
							$docdetial->{$key}=$value;//print "$key <br />";
							
						}
						
						$docdetial->num=$docIndex[$stype.$obj["num"]];	
						$docdetial->newDetial();
						
						//search for old doc index
						//die;
						//update to new index
						unset($docdetial);
					}
				}
				if ($type=='D120') {//Kaballa Detial
					global $DocOpenType;
					$stype=$DocOpenType[$obj['doctype']];
					if (isset($docIndex[$stype.$obj["refnum"]])){
						$rcptdetial=new receiptDetail();
						//$stype=$DocOpenType[$obj['doctype']];
						$rcptdetial->sum=(float)$obj['sum'];
						unset($obj['sum']);
						unset($obj['doctype']);
						foreach($obj as $key=>$value){
							$rcptdetial->$key=$value;
						}
						$rcptdetial->refnum=$docIndex[$stype.$obj["refnum"]];	
						$rcptdetial->newDetial();
						//search for old doc index
						//update to new index
						unset($rcptdetial);
					}
				}
				if ($type=='B100'){//Move Recored
					//print $obj['value'].":".$obj['type'];
					global $openTransType;
					
					if (isset($accIndex[$obj['account']])){
						$bsum= $obj['sum'];
						if($obj['value']==1)
							$bsum= -1 * $obj['sum'];
						//print $bsum."<br />\n";
						$usum=$bsum*-1;
						
						$uaccount=$obj['account1'];
						$stype=$openTransType[$obj['type']];
						unset($obj['sum']);
						unset($obj['value']);
						unset($obj['account1']);
						//adam:! need to reset type of action!
						
						$transaction=new transaction;
						
						foreach($obj as $key=>$value){
							$transaction->$key=$value;//print "$key <br />";
						}
						$transaction->type=$stype;
						$transaction->sum=$bsum;
						$transaction->account=$accIndex[$obj['account']];
						
						if($check){
								if((strtotime($transaction->date)>$begindmy)&&(strtotime($transaction->date)<$enddmy)){
									// "gone";
									$transaction->newTransactions();
								}
								//print "gone2";	
							}else{
								//print "gone1";
								$transaction->newTransactions();
							}
						unset($transaction);
					}
				}
				if ($type=='M100'){//Item In Stock
					$item=new item;
					foreach($obj as $key=>$value){
						$item->$key=$value;
					}
					$item->newItem();
					unset($item);
				}
				unset($obj);
				$suc[$type]++;
			}
			$analze[$type]++;
			if ($analze[$type]>100)	break;
		}
		
		//print_r($docIndex);
		//end loop
		//print_r($accIndex);
	}else{
		print _("error cant open file!");
	}
        
        
    }






    public function make(){
        $this->id= rand(0,999999999999999);
        //$this->iniArr=array('b110'=>0,'b100'=>0,'m100'=>0,'c100'=>0,'d100'=>0,'d110'=>0,'d120'=>0,);
        //$this->docArr=array(0=>0,305=>0,300=>0,);
        $bkmv='';
        //$this->line=1;
        $yiidatetimesec=Yii::app()->locale->getDateFormat('yiidatetimesec');
        $phpdbdatetime=Yii::app()->locale->getDateFormat('phpdbdatetime');

        $from_date=date($phpdbdatetime,CDateTimeParser::parse($this->from_date.":00",$yiidatetimesec));
        $to_date=date($phpdbdatetime,CDateTimeParser::parse($this->to_date.":00",$yiidatetimesec));
        
        //$types=array(3,4,9,11,13,14);
        
        
        
        
        //accounts
        $criteria=new CDbCriteria;
        $accounts= Accounts::model()->findAll($criteria);
        $record=array('id'=>'B110','name'=>'','count'=>0);
        foreach($accounts as $account){
                $this->line++;
                $bkmv.=$account->openfrmt($this->line,$from_date,$to_date); 
                $record['count']++;
        }
        $this->iniArr[]=$record;
        
        
        //items
        $criteria=new CDbCriteria;
        $items= Item::model()->findAll($criteria);
        $record=array('id'=>'M100','name'=>'','count'=>0);
        foreach($items as $item){
                $this->line++;
                $bkmv.=$item->openfrmt($this->line,$from_date,$to_date); 
                $record['count']++;
        }
        $this->iniArr[]=$record;
        //
        //transactions
        $criteria=new CDbCriteria;
        $criteria->condition="valuedate BETWEEN :from_date AND :to_date";
        $criteria->params=array(
            ':from_date' => $from_date,
            ':to_date' => $to_date,
          );
        $transactions= Transactions::model()->findAll($criteria);
        $record=array('id'=>'B100','name'=>'','count'=>0);
        foreach($transactions as $transaction){
                $this->line++;
                $bkmv.=$transaction->openfrmt($this->line,$from_date,$to_date); 
                $record['count']++;

        }
        $this->iniArr[]=$record;
        
        //docs
        $criteria=new CDbCriteria;
        $criteria->condition="due_date BETWEEN :from_date AND :to_date";
        $criteria->params=array(
            ':from_date' => $from_date,
            ':to_date' => $to_date,
          );
        $docs= Docs::model()->findAll($criteria);
        $record=array('id'=>'C100','name'=>'','count'=>0);
        $d110=array('id'=>'D110','name'=>'','count'=>0);
        $d120=array('id'=>'D120','name'=>'','count'=>0);
        

        foreach($docs as $doc){
                $this->line++;
                $bkmv.=$doc->openfrmt($this->line,$from_date,$to_date); 
                foreach($doc->docDetailes as $detial){
                    $this->line++;
                    $bkmv.=$detial->openfrmt($this->line,$from_date,$to_date); 
                    $d110['count']++;
                }
                foreach($doc->docCheques as $detial){
                    $this->line++;
                    $bkmv.=$detial->openfrmt($this->line,$from_date,$to_date);
                    $d120['count']++;
                }
                $type=$doc->getType();
                $this->docArr[$type]=isset($this->docArr[$type])?$this->docArr[$type]+1:0;
                $this->docSumArr[$type]=isset($this->docSumArr[$type])?$this->docSumArr[$type]+$doc->total:$doc->total;
                $record['count']++;
        }
        $this->iniArr[]=$record;
        $this->iniArr[]=$d110;
        $this->iniArr[]=$d120;
        
        
        $company=Settings::model()->findByPk('company.name');
        //A100
        $bkmv=$company->a100(1,$this->id).$bkmv;

        //Z900
        $bkmv=$bkmv.$company->z900($this->line+1,$this->id,$this->line+1);
        
        
        
        $bkmvFile=new Files;
        $bkmvFile->name='bkmvdata.txt';
        $bkmvFile->path='openformt/bkmvdata-'.$this->id.'.txt';//
        $bkmvFile->expire=360;
        $bkmvFile->writeFile($bkmv);
        $this->bkmvId=$bkmvFile->id;
        
        
        
        //A000
        $ini=$company->a000(1,$this->id,$this->line+1);
        foreach($this->iniArr as $line){
            $ini.=$line['id'].sprintf("%015d",$line['count'])."\r\n";
        }
        //Z
        
        $iniFile=new Files;
        $iniFile->name='ini.txt';
        $iniFile->path='openformt/ini-'.$this->id.'.txt';//
        $iniFile->expire=360;
        $iniFile->writeFile($ini);
        $this->iniId=$iniFile->id;
        
        
        
        return $bkmv;      
    }
    

    
     public function docsTable(){
         
       $array=array();
       if(isset($this->docArr)){
        foreach($this->docArr as $key=>$value){
            $array[]=array('id'=>$key,'name'=>'','count'=>$value,'sum'=>$this->docSumArr[$key]);
        }
       }  
         
        return new CArrayDataProvider($array,
                 array(
                                'pagination'=>array(
                                    'pageSize'=>100,
                            ),
                )             
          );
    }
    
    public function bkmvTable(){
        return new CArrayDataProvider($this->iniArr,
                 array(
                                'pagination'=>array(
                                    'pageSize'=>100,
                            ),
                )             
          );
    }
    
}
