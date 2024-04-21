<?php
    if(!isset($_SESSION)) { session_start(); } 
    include 'conn.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $find_query = mysqli_query($con,"SELECT * FROM fc_registration WHERE username = '$username' AND `password` = MD5('$password') AND isAdmin = 1");
    if (mysqli_num_rows($find_query) == 0) {
        mysqli_next_result($con);
        echo 0;
    } else {
        $_SESSION["username"] = $username;
        echo 1;
    }
    mysqli_close($con);
?>