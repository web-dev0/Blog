<?php
    $conn =new mysqli("localhost","root","","blog_sample");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        $n = $_POST["name"];
        $e = $_POST["email"];
        $p = $_POST["password"];

        $sql = "INSERT INTO user_detail (name, email, password) VALUES ('$n', '$e', '$p')";

        mysqli_query($conn, $sql);

        $conn->close();

        //header('location:signin.php');
        header('location:get_query.php');
    }
?>