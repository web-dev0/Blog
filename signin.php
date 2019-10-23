<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
require 'Assets\common pages\connection.php';

$e = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$p = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

if($e != NULL && $p != NULL)
{
    //$sql = "select id, name, email, password from user_detail where email = ". $e . " and password = ".$p;
   $sql = "select * from user_detail  where email='$e' AND password='$p'";

$res=mysqli_query($conn,$sql);
print_r($res);die;
    if (!$result = $conn->query($sql)) 
    {
        print_r($result);

        if($row = $result->fetch_assoc())
        {
            print_r($row);die;
            $location = "location:index.php?id=".$row['id'];
            header($location);
        }
        else
        {
            echo " <h1 id=\"data_miss\"><center>ERROR: DATA NOT FETCH</center></h1> ";
        }
    } 
    else 
    {
        echo " <h1 id=\"data_miss\"><center>ERROR: Login Failed</center></h1> ";
    }
}
?>
 
<div class="centerform">
<div id="title">Log In</div>
    <br><br>
    <form action="signin.php" method="post">
        <label>Email: </label>
        <input type="email" name="email" style="margin-left: 25px;"><br><br>
        <label>Password:</label>
        <input type="password" name="password" style="margin-left: 5px;"><br><br>

        <input type="submit" value="Log IN">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Reset">
    </form>
    <br>
    <a href="signup.php">   <button width="50px">Sign Up</button>   </a>
</div>

<?php require 'Assets\common pages\footer.php'; ?>