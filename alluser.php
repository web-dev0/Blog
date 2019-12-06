<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
require 'Assets\common pages\connection.php';

if($_SESSION['crole'] == 'admin'){

$id = isset($_REQUEST['id']) ?  $_REQUEST['id'] : '';
$action = isset($_REQUEST['action']) ?  $_REQUEST['action'] : '';
$update_name = isset($_REQUEST['name']) ?  $_REQUEST['name'] : '';
$update_password = isset($_REQUEST['password']) ?  $_REQUEST['password'] : '';
$role = isset($_REQUEST['role']) ?  $_REQUEST['role'] : '';
$msg = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';

if($action == 'edit')
{
	$sql = "UPDATE user_detail 
            SET name = '$update_name', password='$update_password', role='$role' 
            WHERE id = '$id'";
	$result=mysqli_query($conn,$sql);
    header('location:alluser.php?msg=update');
}
else if($action == 'delete')
{
	//$sql = "DELETE FROM user_detail WHERE id='$id'";
    $sql = "UPDATE user_detail 
            SET status = '0' 
            WHERE id = '$id'";
    $result=mysqli_query($conn,$sql);
    header('location:alluser.php?msg=delete');
}

if($msg == 'update')
{
    echo " <h1 id=\"sucess_msg\"><center>Updated Sucessfully</center></h1> ";
}
else if($msg == 'delete')
{
    echo " <h1 id=\"sucess_msg\"><center>Deleted Sucessfully</center></h1> ";
}

$sql = "select * from user_detail where status='1'";
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
                        <th>PICTURE</th>
						<th>FULL NAME</th>
						<th>EMAIL</th>
						<th>PASSWORD</th>
                        <th>ROLE</th>
                        <th>DATE</th>
						<th>ACTION</th>
					</tr>   					
	<?php

    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    	?>
    	<tr>
    		<td> <?php echo $row["id"]; ?></td>
            <td> <img src="Assets\images\<?php 
            if($row['img'])
                echo $row['img'];
            else
                echo "user.png"; 
            ?>"style="padding: 1% 1% 1% 1%; height: 10%; width: 15%;"></td>
    		<td> <?php echo $row["name"]; ?></td>
    		<td> <?php echo $row["email"]; ?></td>
    		<td> <?php echo $row["password"]; ?></td>
            <td> <?php echo $row["role"]; ?></td>
            <td> <?php echo $row["Date"]; ?></td>
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

}
else
    header('location:not.php');
require 'Assets\common pages\footer.php'; ?>