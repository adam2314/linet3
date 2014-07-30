<?php

/* Writen by Adam BH */

function dbBackup($filename) {
    global $config;
    $return = '';
    $tables = '*';


    $dbConfig = $config["components"]["dbMain"];

    $db = new PDO($dbConfig['connectionString'] . ";" . $dbConfig['charset'], $dbConfig['username'], $dbConfig['password']);
    //$link = mysql_connect($config['database']['host'].":".$config['database']['port'], $config['database']['user'], $config['database']['password']) or die("Could not connect to host ".$config['database']['host']);
//mysql_query("SET NAMES 'utf8'");
//mysql_select_db($config['database']['name']);
    //get all of the tables

    $file='';//setHeader($db)
    $result = $db->query("show tables");
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        //var_dump($row[0]);
         $file.=dumpTable($db,$row[0]);
    }
    //$file.= setFooter($db);
    

    $handle = fopen($filename, 'w') or die("can't open file");
    fwrite($handle, $file);
    fclose($handle);
}

function dumpTable($pdo,$tableName){
		//$db = Yii::app()->db;
		//$pdo = $db->getPdoInstance();

                //$newTableName=str_replace(Yii::app()->db->tablePrefix,'',$tableName);
                $text='';
		$text.= PHP_EOL."--\n-- Structure for table `$tableName`\n--".PHP_EOL;
		$text.= PHP_EOL.'DROP TABLE IF EXISTS `'.$tableName.'`;'.PHP_EOL.PHP_EOL;

		$q = $pdo->query('SHOW CREATE TABLE `'.$tableName.'`;')->fetch(PDO::FETCH_NUM);
                //print_r($q[1]);
                $create_query = $q[1];
                //echo "\n".$create_query."\n";
                $pattern = '/CONSTRAINT.*|FOREIGN[\s]+KEY/';
                
                // constraints to $tablename
                /*if(preg_match_all($pattern, $create_query,$this->constraints[$tableName])){
                    $create_query=preg_replace($pattern, '', $create_query);
                    $create_query = explode(',',$create_query);
                    for($i=0;$i<count($create_query)-1;$i++){
                        echo ($i>=0 && $i<count($create_query)-2)?$create_query[$i].',':$create_query[$i];
                    }
                } else  {  */    
                    $create_query = explode(',',$create_query);
                    for($i=0;$i<count($create_query)-1;$i++){
                        $text.= $create_query[$i].',';
                    }
                //}
              
               
               
                $text.= "\n".trim($create_query[$i]).";".PHP_EOL;
                

		$rows = $pdo->query('SELECT * FROM `'.$tableName.'`;')->fetchAll(PDO::FETCH_ASSOC);

                    
		if(count($rows)==0)
			return $text.  PHP_EOL.PHP_EOL;
    
		$text.= PHP_EOL."--\n-- Data for table `$tableName`\n--".PHP_EOL.PHP_EOL;

                //print_r($rows);
                
		$attrs = array_map('quates', array_keys($rows[0]));
		$text.= 'INSERT INTO `'.$tableName.'`'." (". implode(', ', $attrs). ') VALUES'.PHP_EOL;
                //echo 'INSERT INTO '.$db->quoteTableName($newTableName).''." (", implode(', ', $attrs), ') VALUES'.PHP_EOL;
		$i=0;
		$rowsCount = count($rows);
		foreach($rows AS $row)
		{
			// Process row
			foreach($row AS $key => $value)
			{
				if($value === null)
					$row[$key] = 'NULL';
				else
					$row[$key] = $pdo->quote($value);
			}

			$text.=  " (". implode(', ', $row). ')';
                        //echo " (", implode(', ', $row), ')';
			if($i<$rowsCount-1)
				$text.=  ',';
			else
				$text.=  ';';
			$text.= PHP_EOL;
			$i++;
		}
		return  $text.  PHP_EOL.PHP_EOL;
	}


function quates($str){
    
    return '`'.$str.'`';
}


function Zip($source, $destination) {
    if (extension_loaded('zip') === true) {
        if (file_exists($source) === true) {
            $zip = new ZipArchive();
            if ($zip->open($destination, ZIPARCHIVE::CREATE) === true) {
                $source = realpath($source);
                if (is_dir($source) === true) {
                    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
                    foreach ($files as $file) {
                        $file = realpath($file);
                        if (is_dir($file) === true) {
                            $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                        } else if (is_file($file) === true) {
                            $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                        }
                    }
                } else if (is_file($source) === true) {
                    $zip->addFromString(basename($source), file_get_contents($source));
                }
            }
            return $zip->close();
        }
    }
    return false;
}

?>