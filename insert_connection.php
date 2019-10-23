<?php
    require 'Assets\common pages\connection.php';
        $n = $_POST["name"];
        $e = $_POST["email"];
        $p = $_POST["password"];

    if($n != NULL && $e != NULL && $p != NULL)
    {
        $sql = "INSERT INTO user_detail (name, email, password) VALUES ('$n', '$e', '$p')";

        mysqli_query($conn, $sql);

        header('location:signin.php?msg=sucess');
    }
    else
    {
        header('location:signup.php?msg=data_miss');
    }

    
?>