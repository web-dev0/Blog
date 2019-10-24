<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
require 'Assets\common pages\connection.php';

$id = isset($_REQUEST['id']) ?  $_REQUEST['id'] : '';
$action = isset($_REQUEST['action']) ?  $_REQUEST['action'] : '';
$update_name = isset($_REQUEST['name']) ?  $_REQUEST['name'] : '';
$update_password = isset($_REQUEST['password']) ?  $_REQUEST['password'] : '';


if($action == 'edit')
{
	$sql = "UPDATE user_detail SET name = '$update_name', password='$update_password' WHERE id = '$id'";
	$result=mysqli_query($conn,$sql);
}
else if($action == 'delete')
{
	$sql = "DELETE FROM user_detail WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
}

$sql = "select id, name, email, password from user_detail";
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
{
	?>
		<br><br>
		<center>
			<table id="full_width">
				<thead>
					<tr>
						<th>ID</th>
						<th>FULL NAME</th>
						<th>EMAIL</th>
						<th>PASSWORD</th>
						<th>ACTION</th>
					</tr>   					
	<?php

    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    	?>
    	<tr>
    		<td> <?php echo $row["id"]; ?></td>
    		<td> <?php echo $row["name"]; ?></td>
    		<td> <?php echo $row["email"]; ?></td>
    		<td> <?php echo $row["password"]; ?></td>
    		<td> 
    			<a href="updateinfo.php?id=<?php echo $row["id"];?>">EDIT</a> 
    			<a href="alluser.php?id=<?php echo $row["id"];?>&action=delete">DELETE</a> 
    		</td>
    	</tr>
    	<?php        
    }

        ?>
        			</thead>
    			</table>
    		</center>
    		<br><br>

        <?php
    } 
    else 
    {
        echo "<br><br><h1><center>No Result found</center></h1><br><br><br><br>";
    }

require 'Assets\common pages\footer.php';
?>