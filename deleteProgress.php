<?php
include_once "paths.php";
if(defined("ROOT_PATH")) {
   $filePath = $_SERVER['DOCUMENT_ROOT'].ROOT_PATH."/progress/".str_replace(array("/","\\"),"",$_GET['file']);
   print $filePath;
   if(file_exists($filePath)) {
    unlink($filePath);
   }
}