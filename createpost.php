<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';

$title = isset($_REQUEST["title"])?$_REQUEST["title"]:'';
$detail = isset($_REQUEST["detail"])?$_REQUEST["detail"]:'';
$img = isset($_REQUEST["img"])?$_REQUEST["img"]:'';
$catagery = isset($_REQUEST["catagery"])?$_REQUEST["catagery"]:'';

if($title!='' && $detail!='' && $img!='' && $catagery!='')
{
    require 'Assets\common pages\connection.php';
    sql = "INSERT INTO post(title, detail, image, catagery) VALUES ('$title','$detail','$img', '$catagery')";
    mysqli_connect();
}




?>

<div class="centerform">
<div id="title">Create Post</div>
    <br><br>
    <form action="createpost.php" method="post">
        <label>Title:</label>
        <input type="text" name="title" style="margin-left: 30px;"><br><br>
        <label>Detail:</label>
        <input type="text" name="detail" style="margin-left: 20px;"><br><br>
        <label>Select images:</label>
        <input type="file" name="img" multiple>
        <br><br>
        <label> Catagery</label>&nbsp&nbsp
        <select name"catagary">
            <option value="Web Development">Web Development</option>
            <option value="IT">IT</option>
            <option value="Security">Security</option>
            <option value="App Development">App Development</option>
            <option value="Wordpress">Wordpress</option>
        </select>
        <br><br>
        <input type="submit" value="Create">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Reset">
        
    </form>
</div>
</div>

<?php require 'Assets\common pages\footer.php'; ?>