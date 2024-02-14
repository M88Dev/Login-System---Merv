<?php

// global $conn;

function db_connect(){
	
	global $conn;

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, 'php_db');
	

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected successfully";
}
	function check_user(){

}