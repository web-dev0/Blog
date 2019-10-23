<?php
     $conn =new mysqli("localhost","root","","blog_sample");
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }   
?>