<?php
        require 'database_connect.php';
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $name=($_POST['name']);
            $mobile=($_POST['mobile']);
            $locality=($_POST['locality']);
            $street=($_POST['street']);
            $city=($_POST['city']);
            $pin =($_POST['pin']);
            $email =($_POST['email']);
            $password =($_POST['password']);
            $hash= password_hash($password,PASSWORD_BCRYPT); 
            // if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
            //     $name_error = "Name must contain only alphabets and space";
            // }
            // if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
            //     $name_error = "Name must contain only alphabets and space";
            // }
            // if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            //     $email_error = "Please Enter Valid Email ID";
            // }
            // if(strlen($password) < 6) {
            //     $password_error = "Password must be minimum of 6 characters";
            // }
            $query="INSERT into `users` (name, mobile , locality, street, city, pin, email, password)
                VALUES ('$name', '$mobile', '$locality', '$street', '$city','$pin','$email','$hash')";
            $result   = mysqli_query($conn, $query);
            echo mysqli_error($conn);
            if ($result) {
                echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='../peepawloginboard.html'>Login</a></p>
                  </div>";
                } 
            else {
                echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='peepawregisterboard.html'>register</a> again.</p>
                  </div>";
                }
            }  
        ?> 