<?php
function db_query($sql, $dbcon = null) {
	
	if(MYSQLI_STATUS=='Y') {
		$result	= mysqli_query($GLOBALS['con'], $sql);
	}
	else {
		$result	= mysql_query($sql) or die (mysql_error());
	}
	return $result;
}

function db_fetch_array($qry){
	if(MYSQLI_STATUS=='Y') {		
		$res=mysqli_fetch_array($qry);
	}
	else {
		$res=mysql_fetch_array($qry);
	}
	
	return $res;
}

function db_fetch_assoc($qry){
	if(MYSQLI_STATUS=='Y') {		
		$res=mysqli_fetch_assoc($qry);
	}
	else {
		$res=mysql_fetch_assoc($qry);
	}
	
	return $res;
}

function db_num_rows($qry){
	if(MYSQLI_STATUS=='Y') {		
		$res=mysqli_num_rows($qry);
	}
	else {
		$res=mysql_num_rows($qry);
	}	
	return $res;
}

function db_real_escape($val){
	$v = mysqli_real_escape_string($GLOBALS['con'], $val);
	return $v;	
}

function db_insert_id(){
	if(MYSQLI_STATUS=='Y') {		
		$v = mysqli_insert_id($GLOBALS['con']);
	}
	else {
		$result	= mysql_insert_id($GLOBALS['con']);
	}
	
	return $v;	
}

function db_error($sql){
	if(MYSQLI_STATUS=='Y') {	
		echo "<div style='font-family: tahoma; font-size: 11px; color: #333333'><br>".mysqli_error($GLOBALS['con'])."<br>";
	}
	else {
		echo "<div style='font-family: tahoma; font-size: 11px; color: #333333'><br>".mysql_error()."<br>";
	}
	print_error();
	if(LOCAL_MODE) {
		echo "<br>sql: $sql";
	}
	echo "</div>";
}

function print_error() {
	$debug_backtrace = debug_backtrace();
	for ($i = 1; $i < count($debug_backtrace); $i++) {
		$error = $debug_backtrace[$i];
		echo "<br>";
		echo "<div>";
		echo "<b>File:</b> ".$error['file']."<br>";
		echo "<b>Line:</b> ".$error['line']."<br>";
		echo "<b>Function:</b> ".$error['function']."<br>";
		echo "</div>";
	}
}
?>