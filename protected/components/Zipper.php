<?php

/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class Zipper {
    
    public static function zip($source, $destination,$exclude='') {
        if (extension_loaded('zip') === true) {
            if (file_exists($source) === true) {
                $zip = new ZipArchive();
                if ($zip->open($destination, ZIPARCHIVE::CREATE) === true) {
                    $source = realpath($source);
                    if (is_dir($source) === true) {
                        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
                        foreach ($files as $file) {
                            if(strpos($file,$exclude)==0){
                                $file = realpath($file);
                                if (is_dir($file) === true) {
                                    $zip->addEmptyDir(str_replace($source . DIRECTORY_SEPARATOR, '', $file . DIRECTORY_SEPARATOR));
                                } else if (is_file($file) === true) {
                                    $zip->addFile($file,str_replace($source . DIRECTORY_SEPARATOR, '', $file));
                                }
                            }
                        }
                    } else if (is_file($source) === true) {
                        $zip->addFile($source,basename($source));
                        //$zip->addFromString(basename($source), file_get_contents($source));
                    }
                }
                return $zip->close();
            }
        }
        return false;
    }
    
    
    public static function unzip($source, $destination) {
        if (extension_loaded('zip') === true) {
            if (file_exists($source) === true) {
                $zip = new ZipArchive();
                if ($zip->open($source) === true) {
                    $zip->extractTo($destination);
                }
                return $zip->close();
            }
        }
        return false;
    }
}
