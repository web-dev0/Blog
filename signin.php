<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
require 'Assets\common pages\connection.php';

$e = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$p = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
$msg = isset($_REQUEST['msg']) ?  $_REQUEST['msg'] : '';

if($e != NULL && $p != NULL)
{
    $sql = "select * from user_detail  where email='$e' AND password='$p' AND status='1'";

    $result=mysqli_query($conn,$sql);

    if ($result) 
    {
        if($row = $result->fetch_assoc())
        {
            session_start();
            $_SESSION['cid']=$row['id'];
            $_SESSION['cname']=$row['name'];
            $_SESSION['cemail']=$row['email'];
            $_SESSION['cpass']=$row['password'];
            $_SESSION['crole']=$row['role'];
            $_SESSION['cdate']=$row['Date'];
            if($row['img'])
                $_SESSION['cimg']=$row['img'];
            else
                $_SESSION['cimg']="user.png";
            header('location:index.php');
        }
        else
        {
            echo " <h1 id=\"error_msg\"><center>ERROR: Login Failed</center></h1> ";
        }
    }
}
else if($msg == 'sucess')
{
    echo " <h1 id=\"sucess_msg\"><center>Registered Sucessfully</center></h1> ";
}

?>
 
<div class="centerform">
<div id="title">Log In</div>
    <br><br>
    <form action="signin.php" method="post">
        <label>Email: </label>&nbsp;
        <input type="email" name="email" style="margin-left: 25px;"><br><br>
        <label>Password:</label>&nbsp;
        <input type="password" name="password" style="margin-left: 5px;"><br><br>

        <input type="submit" value="Log IN">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Reset">
    </form>
    <br>
    <a href="signup.php">   <button width="50px">Sign Up</button>   </a>
</div>

<?php require 'Assets\common pages\footer.php'; ?>