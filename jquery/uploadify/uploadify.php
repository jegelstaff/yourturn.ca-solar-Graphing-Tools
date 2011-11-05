<?php
/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

include_once "../../paths.php"; // added by Julian Egelstaff Nov 2011

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . ROOT_PATH.'/uploads/'; // need to set this to the specific folder where the files should be put -- ROOT PATH reference added by Julian Egelstaff Nov 2011
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'].microtime(true); // added microtime to the filename to help ensure uniqueness -- Julian Egelstaff Nov 5 2011
	
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
	
	// ADDED BY JULIAN EGELSTAFF - OCT 9 2011 - TO LIMIT THE FILE TYPES THAT ARE ALLOWED FOR UPLOADING
	    $dotPos = 0;
            $fileExtensionOK = false;
            while($location = strpos($_FILES['Filedata']['name'],".",$dotPos+1)) {
                $dotPos = $location;
            }
            if($dotPos) {
                $extension = substr($_FILES['Filedata']['name'],$dotPos+1);
                $allowedExtensions = "xls,csv,xlsx,txt";
                if(in_array($extension,explode(",",$allowedExtensions))) {
                    $fileExtensionOK = true;
                }
            }
            if(!$fileExtensionOK) {
		return "Invalid File";
	    }	
	// END OF ADDED CODE
	
	
		
		move_uploaded_file($tempFile,$targetFile);
		echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
	// } else {
	// 	echo 'Invalid file type.';
	// }
}
?>