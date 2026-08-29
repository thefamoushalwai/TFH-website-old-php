<?php
/*error_reporting(E_ALL); 
ini_set('display_errors', 'On');
error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(0); 
session_start();*/

if ($_SERVER['HTTP_HOST'] == "localhost") { //for Local Mode	
	$hostname_conn = "localhost";	
	$database_conn = "aeropaat_thefamoushalwai";	
	$username_conn = "root";
	$password_conn = "";	
	
	$con = mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn);	
	if (mysqli_connect_errno($con)) {		
   		echo "Failed to connect to MySQL:" . mysqli_connect_error();
	}
	
	define("MYSQLI_STATUS","Y"); //mysqli connect
}
else {
	$hostname_conn = "localhost";
	$database_conn = "thefamoushalwai_db";
	$username_conn = "thefamoushalwaiu";
	$password_conn = "deep@kThe524Del";
	$con = mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn);	
	if (!$con) {
   		echo "Failed to connect to MySQL:" . mysqli_connect_error();
	}	
	define("MYSQLI_STATUS","Y"); //mysql connect
}


?>
