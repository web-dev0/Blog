<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
require 'Assets\common pages\connection.php';

if($_SESSION['crole'] == 'author' OR $_SESSION['crole'] == 'admin')
{

    $title = isset($_REQUEST["title"])?$_REQUEST["title"]:'';
    $detail = isset($_REQUEST["detail"])?$_REQUEST["detail"]:'';
    $catagery = isset($_REQUEST["catagery"])?$_REQUEST["catagery"]:'';
    $msg = isset($_REQUEST['msg']) ?  $_REQUEST['msg'] : '';

    if($title!='' && $detail!='' &&  $catagery!='')
    {

        $dir = "Assets/images/";
        $upload_img=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $target_file_path=$dir.$upload_img;
        move_uploaded_file($tmp_name, $target_file_path);
        $cid = $_SESSION['cid'];
        $sql = "INSERT INTO post(title, detail, image, catagery, status, user_id) 
                VALUES ('$title','$detail','$upload_img', '$catagery', '1', '$cid')";
        mysqli_query($conn,$sql);
        header('location:createpost.php?msg=sucess');

    }
    else if($msg == 'sucess')
    {
        echo " <h1 id=\"sucess_msg\"><center>Created Sucessfully</center></h1> ";
    }

?>

    <div class="centerform">
    <div id="title">Create Post</div>
        <br><br>
        <form action="createpost.php" method="post" enctype="multipart/form-data">
            <label>Title:</label>
            <input type="text" name="title" style="margin-left: 30px;">
            <br><br>            
            <label>Select images:</label>
            <input type="file" name="image">
            <br><br>
            <label> Catagery</label>&nbsp;&nbsp;
            <select name="catagery">
                <?php
                    $sql = "select * from catagery";
                    $result=mysqli_query($conn,$sql);
                    if ($result->num_rows > 0) 
                    {
                        while($row = $result->fetch_assoc()) 
                        {
                ?>
            <option value="<?php echo $row["title"]; ?>"><?php echo strtoupper($row["title"]); ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            <br><br>
            <label>Detail:</label>
            <input type="text" name="detail" style="margin-left: 20px; width: 50%;"><br><br><br>
            <input type="submit" value="Create">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Reset">
        </form>
    </div>
    </div>
<?php
}
else{
    header('location:not.php');
}
require 'Assets\common pages\footer.php'; 
?>