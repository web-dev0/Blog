<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
require 'Assets\common pages\connection.php';

$sql = "select * from post where status='1'";
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
    {
    	?>
		<div class="body">
		    <div id="title"><?php echo strtoupper($row["title"]); ?></div>
		    <div class="detail">
		        <img src="Assets\images\<?php echo $row["image"]; ?>" alt="Image" height="400px" width="300px">
		        <div class="para">
		            <?php echo substr($row["detail"], 0, 100); ?>...
		            <a href="post.php?id=<?php echo $row["id"]; ?>"> Read More</a>
		        </div>
		    </div>
		</div>
	<?php
	}
}
require 'Assets\common pages\footer.php';
?>