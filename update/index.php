<?php

/* update writen by Adam BH */
//$_GET['lang'] = 'he';
$update = 1;

date_default_timezone_set('Asia/Tel_Aviv');
require_once('../protected/config/yii.php');
require_once($yii);
$config = include '../protected/config/main.php';
include '../protected/components/dbDump.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');


//include '../private/include/i18n.inc.php';
//include '../private/include/const.inc.php';
//include '../private/include/core.inc.php';
//include '../private/include/version.inc.php';
//include('../private/include/func.inc.php');
//session_start();

$steps = array(1 => Yii::t('update', 'Version Verify'),
    2 => Yii::t('update', 'Backup'),
    3 => Yii::t('update', 'Update'),
    4 => Yii::t('update', 'Finish'));
$allowcancel = true;
//$cookietime = time() + 60*60*24*30;
//setcookie("lang", 'he', $cookietime);

$step = 1;

if (isset($_POST['step']))
    $step = $_POST['step'];
//if(isset($_GET['step'])) $step=$_GET['step'];
$name = isset($_COOKIE['name']) ? $_COOKIE['name'] : '';
$data = isset($_COOKIE['data']) ? $_COOKIE['data'] : '';
if ($step <> count($steps)) {
    $nextStep = $step + 1;
} else {
    $nextStep = 0;
}





$loggedin = false;
if (!empty($name) && ($name != '')) {
    //$loggedin = 1;
    //$name = urldecode($name);
    //global $permissionstbl;
    //$name = urldecode($name);
    //$query = "SELECT * FROM $permissionstbl WHERE name='$name' AND company='*'";
    //$link = mysql_connect($host,$user,$pswd);
    //mysql_select_db($database,$link);


    $dbConfig = $config["components"]["dbMain"];

    $db = new PDO($dbConfig['connectionString'] . ";" . $dbConfig['charset'], $dbConfig['username'], $dbConfig['password']);



    //$result = mysql_query($query);
    //print($query);
    if ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $loggedin = true;
    } else
    if (isset($_POST['non']))
        print Yii::t('update', 'This User has no permssion to update the system');
}elseif (isset($_POST['non'])) {
    //print Yii::t('update',"You Must login to Update the system") . "<br />" . '<a href="../">׳³ג€”׳³ג€“׳³ג€¢׳³ֲ¨ ׳³ן¿½׳³ן¿½׳³ג„¢׳³ֲ ׳³ֻ�</a>';
    //$step = 0;
    //$nextStep = 0;
    $loggedin = true;
}

if (isset($_POST['non'])) {
    //print "<ul>";
    $i = 0;
    print "<span class='ul'>";
    foreach ($steps as $name) {
        $i++;
        if ($name == $steps[$step]) {
            //print "<il class='active'><img src='../../img/btnUpdateActive.png' alt='step' /><span class='num'>$i</span><span>$name</span></il>";
            print "<span class='active'><img src='../img/btnUpdateActive.png' alt='step' /><span class='num'>$i</span><span>$name</span></span>";
        } else {
            //print "<il><img src='../../img/btnUpdate.png' alt='step' /><span class='num'>$i</span><span>$name</span></il>";
            print "<span><img src='../img/btnUpdate.png' alt='step' /><span class='num'>$i</span><span>$name</span></span>";
        }
    }
    //print "</ul>";	
    print "</span>";
}
//print $name.$data;
//print $step<>count($steps);
/* load page */
$title = Yii::t('update', "Linet Update ");
if ($loggedin) {
    if (($step == 1) && (isset($_POST['non']))) {
        $sversion = getVersion($config); //;//from server
        $version = $config['params']['version'];
        $nextStep = 2;
        print "<div class=\"updatetext\">";
        print Yii::t('update', "Welcome To Linet update wizard your system version is: ") . $version . "<br />" . Yii::t('update', "The current version is: ") . $sversion . "<br />";
        if ($version != $sversion)
            print Yii::t('update', "You need to update your system.");
        print "</div>";
        //if ($nextStep) print "<a href=javascript:postwith('index.php',{step:'".$nextStep."'})>׳³ג€�׳³ג€˜׳³ן¿½</a>";//bla

        print '<div class="control"><a class="btn btn-primary" onclick="document.location.href=\'../../\'" >' . Yii::t('update', "Cancel") . '</a>';
        //if($version!=$sversion)
        print '<a class="btn btn-primary" onclick="loadDoc(' . $nextStep . ')" >' . Yii::t('update', "Next") . '</a>';
        print '</div>';
    }else {
        $content = Yii::t('update', "Please Wait"); //error
    }
    /* backup */
    if (($step == 2) && (isset($_POST['non']))) {
        include 'Backup.php';
        print "<div class=\"updatetext\">";
        if (is_writeable($config['basePath'] . "/files")) {
            print Yii::t('update', "Backup system and database, it is heighly advised to save a local copy of the backup files") . "<br />";
            print Yii::t('update', "Backuping system files") . "...<br />";
            /* delete old files */
            if ($handle = opendir($config['basePath'] . "/files")) {
                while (false !== ($file = readdir($handle))) {
                    if ((strpos($file, ".zip")) || (strpos($file, ".sql")))
                        unlink($config['basePath'] . "/files/" . $file);
                }
            }

            //adam: Zip($config['basePath'] . "/", $config['basePath'] . '/files/files' . date('dmY') . '.zip');
            print Yii::t('update', "Done") . "<br />";
            print "<a href='../files/files" . date('dmY') . ".zip'>" . Yii::t('update', "Downlod System Files") . "</a><br />";
            print Yii::t('update', "Backuping database") . "...<br />";
            $bkfile = $config['basePath'] . '/files/db' . date('dmY') . '.sql'; //'.date('Ymd').'
            dbBackup($bkfile);
            print Yii::t('update', "Done") . "<br />";

            print "<a href='../files/db" . date('dmY') . ".sql'>" . Yii::t('update', "Download Database file") . "</a><br />";
        }else {
            print "Error: Unable to write into Backup folder please check permissions:<br />" . $config['basePath'] . "/files";
            $nextStep = 0;
        }
        print "</div>";

        print '<div class="control"><a class="btn btn-primary" onclick="document.location.href=\'../\'" >' . Yii::t('update', "Cancel") . '</a>';
        print '<a class="btn btn-primary" onclick="loadDoc(' . $nextStep . ')" >' . Yii::t('update', "Next") . '</a></div>';
        //print "<a href=javascript:postwith('index.php',{step:'".$nextStep."'})>׳³ג€�׳³ג€˜׳³ן¿½</a>";//bla
    }
    /* update */
    if (($step == 3) && (isset($_POST['non']))) {
        print Yii::t('update', "asking file list for update") . "<br />";
        $nextStep = 0;

        print Yii::t('update', "checking permissions") . ".<br />";
        $logfile = $config['basePath'] . "/files/updatelog" . date('dmY') . '.txt';
        if (permisionChk($logfile)) {
            $log = fopen($logfile, 'w') or die("can't open file");
            logMe("Start Loging: ", $log);
            $updatefile = GetList($config);
            logMe("Got File list ", $log);
            $safty = true;
        } else {
            $safty = false;
            print Yii::t('update', "Error: cant write log file") . ".<br />";
        }
        /*
          foreach ($updatefile as $value) {
          $value = $config['basePath'] . "/../" . $value;
          if (permisionChk($value)) {

          } else {
          $safty = false;
          print Yii::t('update', "-Please check write permissions to: ") . $value . ".<br />";
          }
          } */
        //exit;
        //$safty = false;
        if ($safty) {//update all the files
            print Yii::t('update', "Finished permission check") . "<br />" . Yii::t('update', "Begin updating files") . "<br />";
            $sversion = getVersion($config);
            foreach ($updatefile as $value) {
                //log: trying to ge file
                logMe("GetFile:" . $value, $log);


                //$file = getFile($value, $config);
                $file = ';';

                //echo 'exit';
                //exit;
                if ($file == '') {
                    print 'error empty file!';
                    exit;
                }
                $value = $config['basePath'] . "/../" . $value;

                print "+Got file: $value<br />";
                $fh = fopen($value, 'w') or die("can't open file");
                logMe("Writing file: " . $value, $log);
                //print "<hr />$file<hr />";
                fwrite($fh, $file); //^better large files support
                logMe("Wrote file: " . $value, $log);
                fclose($fh);
            }
            //log:end


            logMe("Finished updating files", $log);
            print Yii::t('update', "Finished updating files") . ".<br />";
            /* update db */
            print Yii::t('update', "asksing database update") . "<br />";
            logMe("Get database update", $log);
            $command = ';'; //getSQL($config);
            logMe("Got DB updae", $log);
            if ($command <> '') {
                //connect mysql server
                fwrite($log, "Connect to MySql Server" . "\n");
                logMe("Got DB updae", $log);
                $link = mysql_connect($host, $user, $pswd);
                //select db
                fwrite($log, "Select Database" . "\n");
                mysql_select_db($database, $link);
                //run query
                fwrite($log, "Run query: " . $command . "\n");
                $result = mysql_query($command);
                //log updated
                fwrite($log, "Finshed sqling" . "\n");
            } else {
                fwrite($log, "no sql" . "\n");
                //no command no need to sql
            }
            //unzip upgrade.zip
            $zip = new ZipArchive;
            $res = $zip->open($config['basePath'] . '/../upgrade.zip');
            if ($res === TRUE) {
                $zip->extractTo($config['basePath'] . "/../");
                $zip->close();
                echo 'ok';
            } else {
                echo 'failed';
            }
            echo "<br />";
            //new add costum commands
            if (file_exists($config['basePath'] . '/../upgrade.php')) {
                include $config['basePath'] . '/../upgrade.php';
                rename($config['basePath'] . '/../upgrade.php', $config['basePath'] . '/../upgrade.php.done');
            }
        } else {
            print Yii::t('update', "Can Not Continue Without!") . "<br />";
        }
        logMe("End Loging", $log);
        fclose($log);
        $nextStep = 4;
        if ($nextStep)
        //print '<a class="btnaction" href="javascript:loadDoc('.$nextStep.')">'.Yii::t('update',"Next").'</a>';
        //print '<div class="control"><input type="button" class="btnaction" onclick="document.location.href=\'../../\'" value="'.Yii::t('update',"Cancel").'" />';
            print '<a class="btn btn-primary" onclick="loadDoc(' . $nextStep . ')" >' . Yii::t('update', "Next") . '</a>';
        //print "<a href=javascript:postwith('index.php',{step:'".$nextStep."'})>׳³ג€�׳³ג€˜׳³ן¿½</a>";//bla
    }
    /* end */
    if (($step == 4) && (isset($_POST['non']))) {
        print Yii::t('update', "Linet has been successfully updated") . "<br />";
        print '<a href="../private/files/updatelog' . date('dmY') . '.txt">' . Yii::t('update', "log file") . '</a><br />';
//print '<a class="btnaction" href="../../">'.Yii::t('update',"Finished").'</a>';
        print '<a class="btn btn-primary" onclick="document.location.href=\'../\'" >' . Yii::t('update', "Finished") . '</a>';
//print '<input type="button" class="btnaction" onclick="loadDoc('.$nextStep.')" value="'.Yii::t('update',"Next").'" /></div>';
    }
}


/* documenet */
if (!isset($_POST['non']))
    include('look.php');
/*

 */

function getSQL($config) {
    $updatesrv = $config['params']['updatesrv'];
    $version = $config['params']['version'];
    if ($fp = fopen($updatesrv . '?GetSql&Version=' . $version, 'r')) {
        $content = fread($fp, 1024);
        while ($line = fread($fp, 1024)) {
            $content .= $line;
        }
    }
    return $content;
}

function getFile($fileName, $config) {
    $updatesrv = $config['params']['updatesrv'];
    $version = $config['params']['version'];

    $content = requ($updatesrv . '?GetFile=' . base64_encode($fileName) . '&Version=' . $version);
    /* if ($fp = fopen($updatesrv . '?GetFile=' . base64_encode($fileName) . '&Version=' . $version, 'r')) {
      $content = fread($fp, 1024);
      while ($line = fread($fp, 1024)) {
      $content .= $line;
      }
      } */

    //$content = file_get_contents($updatesrv . '?GetFile=' . base64_encode($fileName) . '&Version=' . $version);
    //echo $updatesrv . '?GetFile=' . base64_encode($fileName) . '&Version=' . $version;


    return base64_decode($content);
}

function getVersion($config) {
    $updatesrv = $config['params']['updatesrv'];
    $version = $config['params']['version'];
    //if ($fp = fopen($updatesrv . "?GetLateset&ver=$version", 'r')) {
    //   $content = fread($fp, 1024);
    //   return $content;
    //}



    $ctx = stream_context_create(array('http' =>
        array(
            'timeout' => 5 // 30 sec
        )
    ));

    //$conetnt = file_get_contents('http://example.com',false,$ctx);
    return file_get_contents($updatesrv . "?GetLateset&ver=$version", false, $ctx);
}

function getList($config) {
    $updatesrv = $config['params']['updatesrv'];
    $version = $config['params']['version'];
    /* if ($fp = fopen($updatesrv . '?GetList&Version=' . $version, 'r')) {
      $content = fread($fp, 1024);
      while ($line = fread($fp, 1024)) {
      $content .= $line;
      }
      }
     */
    $content = requ($updatesrv . '?GetList&Version=' . $version);
    $filelist = explode('<br />', $content);
    array_pop($filelist);
    //print_r($filelist);
    return $filelist;
}

function logMe($text, $log = null) {
    if ($log === null)
        global $log;
    fwrite($log, date('d/m/Y H:i:s') . ":\t" . $text . "\n");
}

function requ($url, $log = null) {
    if ($log === null)
        global $log;
    logMe("Making Requst: " . $url, $log = null);

    if ($fp = fopen($url, 'r')) {
        $line = fread($fp, 1024);
        while ($line != "<EOF>") {
            $line = fread($fp, 1024);
            $content .= $line;
        }
    }
    logMe("End Requst: " . $url, $log = null);
    return $content;
}

function permisionChk($filename) {
    //echo $filename.'<br />\n';
    return true;
    if (file_exists($filename)) {
        if (is_writeable($filename)) {
            return true;
        } else {
            return false;
        }
    } else {
        //print dirname($filename);
        if (is_writeable(dirname($filename))) {
            return true;
        } else {
            return false;
        }
    }
}

?>