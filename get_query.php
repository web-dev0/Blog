<?php
     $conn =new mysqli("localhost","root","","blog_sample");
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     else{
        //  $e = $_POST["email"];
        //  $p = $_POST["password"];
 
         $sql = "select id, name, email, password from user_detail";
 
         $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                echo "id: " . $row["id"]. " Name: " . $row["name"]. " Email: " . $row["email"]." Password: " . $row["password"]. "<br>";
            }
        } 
        else 
        {
            echo "0 results";
        }
        
        // header('location:signin.php');
     }
?>