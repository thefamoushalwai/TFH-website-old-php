<?php
session_start();
error_reporting(E_ALL); 
//ini_set('display_errors', 'On');
error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(0); 

if ($_SERVER['HTTP_HOST'] == "localhost") {
    define('LOCAL_MODE', true);
} else {
 	define('LOCAL_MODE', false);
}

date_default_timezone_set('Asia/Calcutta'); 

//define('INQUIRY_API_ACCESS_KEY', 'SG#^TP152K@NP#RG5R');

if ($_SERVER['HTTP_HOST'] == "localhost") { //for Local Mode
	
	$path = "http://localhost/thefamouseh";		
	$tmp = dirname(__FILE__);
	$tmp = str_replace('\\' ,'/',$tmp);
	$tmp = substr($tmp, 0, strrpos($tmp, '/'));
	define('BASEDIR', $tmp); 
}
else {		
	$path = "https://www.thefamoushalwai.com"; //Online URL	
	define('BASEDIR', $_SERVER['DOCUMENT_ROOT']);		
}
define("SITE_URL", $path);
define("ADMIN_SITE_URL", $path."/wbadmin");	
define('PROJECT_NAME', 'The Famous Halwai');	
define("SITE_FOOTER", "Copyright &copy; ".date('Y').", The Famous Halwai. All Right Reserved.");    
?>
