<?php
        include("../php/login.php");
        require('../php/database_connect.php');
        if ($_SERVER['REQUEST_METHOD']=='POST') {
          $xpath = new DOMXPath(@DOMDocument::loadHTML($html));
          $src = $xpath->evaluate("string(//img/@src)");
            $petspecies = ($_POST['pet-species']);
            $breed = ($_POST['breed']);
            $gender = ($_POST['gender']);
            $age = ($_POST['age']);
            $vaccination = ($_POST['vaccination']);
            $image1 = ($_POST['image']);
            $image2 = ($_POST['image2']);
            $image3 = ($_POST['image3']);
            $image4 = ($_POST['image4']);
            $image5 = ($_POST['image5']);
            $price = ($_POST['price']);
            $discription =($_POST['discription']);
            $uid = $_SESSION['id'];
            $query="INSERT into `pets` (uid, species, breed, gender, age, v_status, image1, image2, image3, image4, image5, price, p_desc)
                VALUES ('$uid', '$petspecies', '$breed', '$gender', '$age','$vaccination','$image1','$image2','$image3','$image4','$image5','$price', '$discription')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<div class='form'>
                  <h3>Your Pet is Registered Succesfully.</h3><br/>
                  <p class='link'>Click here to <a href='peepawhome.php'>Go back to home</a></p>
                  </div>";
                } 
            else {
                echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='petdataform.html'>registration</a> again.</p>
                  </div>";
                }
            }  
        ?> 