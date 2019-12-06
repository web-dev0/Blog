<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';

if($_SESSION['crole'] == 'admin'){

$title = isset($_REQUEST["title"])?$_REQUEST["title"]:'';
$msg = isset($_REQUEST['msg']) ?  $_REQUEST['msg'] : '';

if($title!='')
{
    require 'Assets\common pages\connection.php';
    $sql = "INSERT INTO catagery(title) VALUES ('$title')";
    mysqli_query($conn, $sql);
    header('location:createcatagery.php?msg=sucess');
}
else if($msg == 'sucess')
{
    echo " <h1 id=\"sucess_msg\"><center>Added Sucessfully</center></h1> ";
}

?>

<div class="centerform">
<div id="title">Create Catagery</div>
    <br><br>
    <form action="createcatagery.php" method="post">
        <label>Title:</label>
        <input type="text" name="title" style="margin-left: 30px;"><br><br>
        <br><br>
        <input type="submit" value="ADD">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Reset">
    </form>
</div>
</div>

<?php
}
else
    header('location:not.php');
require 'Assets\common pages\footer.php'; ?>