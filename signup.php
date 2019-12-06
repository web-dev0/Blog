<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';

$msg = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';

if($msg=='data_miss'){
    ?>  <h1 id="error_msg"><center>ERROR: Fill all necessary Fields.</center></h1>    <?php
}
else if($msg=='registered')
{

    require 'Assets\common pages\connection.php';
    $n = $_REQUEST["name"];
    $e = $_REQUEST["email"];
    $p = $_REQUEST["password"];
    $cp = $_REQUEST["cpassword"];
    $r = $_REQUEST["role"];
    


    if($n != NULL && $e != NULL && $p != NULL&& $cp != NULL)
    {
        if($p == $cp)
        {

            $sql = "select * from user_detail  where email='$e' AND status='0'";

            $result=mysqli_query($conn,$sql);

            if ($result) 
            {
                if($row = $result->fetch_assoc())
                {
                    $location = "location:signup.php?msg=already";
                    header($location);
                }
                else
                {
                    $dir = "Assets/images/";
                    $upload_img=$_FILES['image']['name'];
                    if($upload_img=='')
                        $upload_img=0;
                    $tmp_name=$_FILES['image']['tmp_name'];
                    $target_file_path=$dir.$upload_img;
                    move_uploaded_file($tmp_name, $target_file_path);
                    $sql = "INSERT INTO user_detail (name, email, password, role, status, img) VALUES ('$n', '$e', '$p', '$r','1', '$upload_img')";
                    mysqli_query($conn, $sql);
                    header('location:signin.php?msg=sucess');
                }
            }
        }
        else
        {
            header('location:signup.php?msg=wrongepassword');
        }
    }
    else
    {
        header('location:signup.php?msg=data_miss');
    }
}
else if($msg=='already')
{
    ?>  <h1 id="error_msg"><center>ERROR: User already exist</center></h1>    <?php
}
else if($msg=='wrongepassword')
{
    ?>  <h1 id="error_msg"><center>ERROR: Password Not Matched</center></h1>    <?php
}

?>

<div class="centerform">
    <div id="title">Sign Up</div>
    <br><br>
    <form action="signup.php?msg=registered" method="post" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" style="margin-left: 30px;"><br><br>
        <label>Select images:</label>
        <input type="file" name="image"><br><br>
        <label>Email:</label>
        <input type="email" name="email" style="margin-left: 28px;"><br><br>
        <label>Password:</label>
        <input type="password" name="password" style="margin-left: 5px;"><br><br>
        <label>Confirm: &nbsp;</label>
        <input type="password" name="cpassword" style="margin-left: 5px;"><br><br>
        <label>Role</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="role">
            <option value="author">Author</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <br><br><br>
        <input type="submit" value="Registered">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Reset">
        
    </form>
</div>

<?php require 'Assets\common pages\footer.php'; ?>