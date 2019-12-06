<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
require 'Assets\common pages\connection.php';

if($_SESSION['crole'] == 'admin'){

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

$sql = "select * from user_detail  where id='$id'";
$result=mysqli_query($conn,$sql);

if ($result) 
{
    if($row = $result->fetch_assoc())
    {
        $name = $row['name'];
        $password =$row['password'];
        $role = $row['role'];
    }
}
?>
 
<div class="centerform">
<div id="title">Update Info</div>
    <form action="alluser.php" method="post">

        <label>Name:</label>
        <input type="text" name="name" style="margin-left: 25px;" value="<?php echo $name ?>">
        <br><br>

        <label>Password:</label>
        <input type="text" name="password" style="margin-left: 5px;" value="<?php echo $password ?>">
        <br><br>

        <label>Role</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="role">
            <option value="author">Author</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <br><br><br>

        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="action" value="edit">

        <input type="submit" value="Edit">

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input type="reset" value="Reset">
    </form>
    
    <br><br>
</div>

<?php
}
else
    header('location:not.php');
require 'Assets\common pages\footer.php'; ?>