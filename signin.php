<?php 
require 'Assets\common pages\variable.php';
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
?>
 
<div class="centerform">
<div id="title">Log In</div>
    <br><br>
    <form action="index.php" method="post">
        <label>Email: </label>
        <input type="email" name="email" style="margin-left: 25px;"><br><br>
        <label>Password:</label>
        <input type="password" name="password" style="margin-left: 5px;"><br><br>

        <input type="submit" value="Log IN">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Reset">
        
    </form>
    <br>
    <a href="signup.php">
        <button width="50px">Sign Up</button>
    </a>
</div>

<?php require 'Assets\common pages\footer.php'; ?>