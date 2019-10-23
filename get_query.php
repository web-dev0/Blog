<?php
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
        echo "0 results found";
    }
?>