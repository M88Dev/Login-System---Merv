<?php 

session_start(); 

include('config.php');
include('function.php');

db_connect();

 if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['update'])){

        $o_password = $_POST['o_password'];
        $o_password = filter_input(INPUT_POST, "o_password", FILTER_SANITIZE_SPECIAL_CHARS);
        $sqli = "SELECT * FROM users WHERE pass = '$o_password'";
        mysqli_query($conn, $sqli);
        $result = mysqli_query($conn, $sqli);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);

        $n_password = $_POST['n_password'];
        $n_password = filter_input(INPUT_POST, "n_password", FILTER_SANITIZE_SPECIAL_CHARS);
        $n_password = mysqli_real_escape_string($conn,$n_password);
        $n_password = htmlentities($n_password);

        $c_password = $_POST['c_password'];
        $c_password = filter_input(INPUT_POST, "c_password", FILTER_SANITIZE_SPECIAL_CHARS);
        $c_password = mysqli_real_escape_string($conn,$c_password);
        $c_password = htmlentities($c_password);

        if($count == 1){


             if ($c_password === $n_password) {

                 $username=$_SESSION['username'];    
                 $sql="UPDATE users SET pass='$n_password' WHERE user='$username'";
                 $res=mysqli_query($conn,$sql);
                             
                 if($res){

                    echo "Password successfully changed";
                    }


                    }
                 else {

                    echo "Password did not match";
                    }
                            

             }

             else {

                echo "Wrong old password";
             }
        }

 }


?> 

<form method="post">
    <table>
        <tr>
            <td>
                <input type="hidden" name="id" value="<?php echo $_SESSION['username']; ?>">
                <input required placeholder="Type old Password" type="password" name="o_password"><br>
                <input pattern=".{4,}" required placeholder="New Password" type="password" name="n_password" title=" should be minimum of 4 characters"><br>
                <input required placeholder="Confirm New Password" type="password" name="c_password"><br>
                <button type="submit" name="update">update</button>
            </td>
        </tr>
    </table>
</form>




<a href="home.php">back to home</a>
