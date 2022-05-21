<?php
    $conn = mysqli_connect("127.0.0.1","root","","peepaw");
    if(mysqli_connect_errno()){
        echo "Failed to connect MySQL.";
        return;    
    }
?>