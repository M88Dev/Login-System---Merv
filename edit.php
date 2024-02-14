
    
<?php

session_start(); 

include('config.php');
include('function.php');

db_connect();


try{

    if(count($_POST)>0){
        mysqli_query($conn, "UPDATE users SET user='{$_POST['user']}', pass='{$_POST['pass']}', email='{$_POST['email']}' WHERE id='" . $_POST['id'] . "'");

        echo "credentials succesfully updated";
    }

    $username=$_SESSION['username'];  
    $result = mysqli_query($conn, "SELECT * FROM users WHERE user='$username'");
    $row = mysqli_fetch_array($result);
    
    } catch(mysqli_sql_exception){
        echo "email already exist.";
    }

     mysqli_close($conn);

?>


<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input placeholder="New Username" required type="text" name="user" value="<?php echo $row["user"]; ?>" hidden><br>
    <input placeholder="New Password" required type="text" name="pass" value="<?php echo $row["pass"]; ?>"><br>
    <input placeholder="New Email" required type="text" name="email" value="<?php echo $row["email"]; ?>"><br>
    <button type="submit" name="submit">UPDATE</button>
</form>

 <a href="home.php">back to home</a>
  

  

