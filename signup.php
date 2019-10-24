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


    if($n != NULL && $e != NULL && $p != NULL)
    {

        $sql = "select * from user_detail  where email='$e'";

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
                $sql = "INSERT INTO user_detail (name, email, password) VALUES ('$n', '$e', '$p')";
                mysqli_query($conn, $sql);
                header('location:signin.php?msg=sucess');
            }
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

?>

<div class="centerform">
    <div id="title">Sign Up</div>
    <br><br>
    <form action="signup.php?msg=registered" method="post">
        <label>Name:</label>
        <input type="text" name="name" style="margin-left: 30px;"><br><br>
        <label>Email:</label>
        <input type="email" name="email" style="margin-left: 28px;"><br><br>
        <label>Password:</label>
        <input type="password" name="password" style="margin-left: 5px;"><br><br>

        <input type="submit" value="Registered">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Reset">
        
    </form>
</div>

<?php require 'Assets\common pages\footer.php'; ?>