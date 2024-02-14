
<?php

include('config.php');
include('function.php');

db_connect();

    try{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $passwords = filter_input(INPUT_POST, "passwords", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

            if(empty($username)){
                echo "Please enter a username";
            }
            elseif(empty($passwords)){
                echo "please enter a password";
            }
            elseif(empty($email)){
                echo "please enter an email";
            }
            else{
                $sql = "INSERT INTO users (user, pass, email) VALUES ('$username', '$passwords', '$email')";

                mysqli_query($conn, $sql);
                echo "Your are now registered!";
            }
        }
    }
    catch(mysqli_sql_exception){
        echo "Username or Email is already registered";
    }


mysqli_close($conn);

?>

<form method="post">
    <input required placeholder="Username" type="text" name="username"><br>
    <input pattern=".{4,}" required placeholder="Password" type="password" name="passwords" title=" should be minimum of 4 characters"><br>
    <input required placeholder="Email" type="text" name="email"><br>
    <button type="submit" name="register">REGISTER</button>
</form>

<a href="login.php">back to login</a>

