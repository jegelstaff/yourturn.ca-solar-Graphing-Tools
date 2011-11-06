<?php

include_once "paths.php";
$fileName = strip_tags(htmlspecialchars(stripslashes($_GET["file"])));

header("Content-Description: File Transfer");
header("Content-Disposition: Attachment;filename=$fileName");
header("Content-Type: image/png");
header("Content-Transfer-Encoding: binary");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Pragma: public");
header("Content-Length: ".filesize($_SERVER['DOCUMENT_ROOT'].ROOT_PATH."/uploads/$fileName"));
readfile($_SERVER['DOCUMENT_ROOT'].ROOT_PATH."/uploads/".$fileName);
exit;