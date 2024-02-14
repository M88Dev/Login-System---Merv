<?php

session_start(); 

include('config.php');
include('function.php');

db_connect();

echo 'Welcome ' , $_SESSION["username"], '<br>';

?>

<table style="border: 1px solid;">
	<tr>
		<td><a href="edit.php">edit</a></td>
		<td><a href="delete.php">delete</a></td>
		<td><a href="change.php">Change Password</a></td>
		<td><a href="upload.php">Upload Images</a></td>
	</tr>
</table>

<a href="login.php">Log-out</a>




