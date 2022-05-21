<?php
    require 'database_connect.php';
    session_start();
    if (isset($_POST['name'])&& isset($_POST['password'])){
        $name=($_POST['name']);
        $password=($_POST['password']);
        $query="SELECT * FROM `users` WHERE name='$name'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        //$rows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];
        $verify = password_verify($password,$hash);
        if($verify){
            if ($row['name'] == $name ) {
                echo "Logged in!";
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                // $_SESSION['first_name'] = $row['first_name'];
                header("Location:../after login/Home.html");
                exit();
            }
            else{
                echo "<div class='form'>
                <h3>Incorrect Email/Password.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                </div>";
                }
            }
        }         
?>