<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';

if(!isset($_SESSION['cid']))
    header('location:not.php');
?>

<div class="centerform">
    <div id="title">Profile Detail</div>
    <img src="Assets\images\<?php echo $_SESSION["cimg"]; ?>" alt="Image Not Found" border="1px" style="padding: 1% 1% 1% 1%; height: 10%; width: 15%;"><br><br>
    <label>id: &nbsp;&nbsp; <?php echo $_SESSION['cid']?></label><br><br>
    <label>Name: &nbsp;&nbsp; <?php echo $_SESSION['cname']?></label><br><br>
    <label>Email: &nbsp;&nbsp; <?php echo $_SESSION['cemail']?></label><br><br>
    <label>Password: &nbsp;&nbsp; <?php echo $_SESSION['cpass']?></label><br><br>
    <label>Role: &nbsp;&nbsp; <?php echo strtoupper($_SESSION['crole'])?></label>
</div>

<?php require 'Assets\common pages\footer.php'; ?>