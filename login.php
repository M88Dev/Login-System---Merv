<?php


session_start(); 

include('config.php');
include('function.php');

db_connect();

// $sql = "SELECT * FROM users WHERE user='{$_POST['username']}', pass='{$_POST['pass']}'";


// if(isset($_REQUEST['submit'])){

// 	if ($_REQUEST['username'] == $user AND $_REQUEST['pass'] == $pass) {
// 		echo "login success <br>";
// 		header('location: home.php?id=<?php echo $row["id"];
// 		} 
// 		else{
// 			echo "Error login: invalid credentials <BR>";
// 		}
// }

// 


// <h1>Login</h1>

// <form method="post">
	
// 	<label>
// 		Username
// 		<input type="text" name="username"><br>
// 		Password
// 		<input type="password" name="pass"><br>
// 		<input type="submit" name="submit" value="login">
// 	</label>

// </form> -->


				if($_SERVER["REQUEST_METHOD"] == "POST"){
					$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
					$passwords = filter_input(INPUT_POST, "passwords", FILTER_SANITIZE_SPECIAL_CHARS);

	
					if(empty($username)){
						echo "Please enter a username";
					}
					elseif(empty($passwords)){
						echo "please enter a password";
					}
					else{
						$sql = "SELECT * FROM users WHERE user = '$username' and pass = '$passwords'";
						$result = mysqli_query($conn, $sql);  
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
						$count = mysqli_num_rows($result);
						if($count == 1){  	
							// header("Location: home.php?id=$row[id];");
							$_SESSION["username"] = $_POST["username"];
							header('Location: home.php');
						}  
						else{ 
							echo "<h4> Login failed. Invalid username or password.</h4>";
						}   
					}
				}
				mysqli_close($conn);

?>
						<form method="post">
							<input required placeholder="Username" type="text" name="username"><br>
							<input required placeholder="Password" type="password" name="passwords"><br>
							<button type="submit" name="login">LOG IN</button>
						</form>
						
						<a href="register.php">Add User</a>

