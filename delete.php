<?php

session_start(); 

include('config.php');
include('function.php');

db_connect();

$username=$_SESSION['username']; 

	if(isset($_SESSION['username'])){
		// $id = $_GET['id'];
		$delete = mysqli_query($conn, "DELETE FROM users WHERE user='$username'");
		echo "User is now deleted";
	}

?>

<a href="login.php">back to login-page</a>