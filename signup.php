<?php 
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';

$msg = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';

if($msg=='data_miss'){
    ?>  <h1 id="data_miss"><center>ERROR: Fill all necessary Fields.</center></h1>    <?php
}
?>

<div class="centerform">
    <div id="title">Sign Up</div>
    <br><br>
    <form action="insert_connection.php" method="post">
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