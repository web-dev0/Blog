<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
require 'Assets\common pages\connection.php';

$id = isset($_REQUEST['id']) ?  $_REQUEST['id'] : '';
$msg = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';

if($msg == 'comment')
{
	$comment = $_REQUEST['comment'];
	if($comment!='')
	{
		$cid =$_SESSION['cid'];
		$sql = "INSERT INTO comment (comment, user_id, post_id) 
		 		VALUES ('$comment', '$cid', '$id')";
	            mysqli_query($conn, $sql);
	            $dir = "location:post.php?msg=sucess&id=".$id;
	            header($dir);
    }

}
else if($msg == 'sucess')
{
    echo " <h1 id=\"sucess_msg\"><center>Commented Sucessfully</center></h1> ";
}

$sql = "select * from post where status='1' AND id='$id'";
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
    {
?>
	<div id="title"><?php echo strtoupper($row["title"]); ?></div>
	<div>
	    <img src="Assets\images\<?php echo $row["image"]; ?>" alt="Image" height="auto" width="100%">
	</div>
	<div class="post">
	    <?php echo $row["detail"]; ?>
	</div>
<?php 
		}
}

?>


	<div style="font-size: 50px; font-family: monospace; color: blue; font-weight: bold;">Comment</div>
    <br>
    <?php
    	if(isset($_SESSION['cid']))
		{
	?>


    <form action="post.php?msg=comment&id=<?php echo $id ?>" method="post" style="margin-bottom: 2%;">
        <label>Comment:</label>
        <input type="text" name="comment" style="width: 75%;">
        <input type="submit" value="Comment">
    </form>

    <br><br><br>
    
    <?php
	}
    	$sql = "SELECT name, img, comment FROM user_detail JOIN COMMENT ON user_detail.id = COMMENT.user_id WHERE COMMENT.post_id = '$id'";
		$result=mysqli_query($conn,$sql);
		
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
		    {
		    	

    ?>
    <img src="Assets\images\<?php 
    	if($row['img'])
    		echo $row['img'];
    	else
    		echo 'user.png';
    ?>" 
    height='100%' width='3%'> 
    &nbsp;&nbsp;&nbsp;&nbsp;
    <div style="font-size: 300%; font-family: monospace; font-weight: bold; display: inline-block;">	
    	<?php echo $row['name']?>:	
    </div>&nbsp;&nbsp;

    <div style="font-size: 250%; font-family: monospace;  display: inline-block;">	
    	<?php echo $row['comment']?>	
    </div>
    <br><br>
	<?php 
			}
	}
	?>
	<br><br>
<?php
require 'Assets\common pages\footer.php'; 
?>