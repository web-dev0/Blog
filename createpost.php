<?php 
require 'Assets\common pages\variable.php';
require 'Assets\common pages\head.php';
require 'Assets\common pages\mainheader.php';
?>

<div class="centerform">
<div id="title">Create Post</div>
    <br><br>
    <form action="index.php" method="post">
        <label>Title:</label>
        <input type="text" name="name" style="margin-left: 30px;"><br><br>
        <label>Detail:</label>
        <input type="text" name="name" style="margin-left: 20px;"><br><br>
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