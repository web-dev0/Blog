
<header style="background-color: deepskyblue">
    <div style="display: inline-block">
        <img src="Assets/Images/logo.png" alt="Logo" height="70px" width="75px">
    </div>
    <h1 style="display: inline-block; color: darkblue; padding-left: 2%;">Blog</h1>
    
    <nav class = "menu" style="float: right; margin: 25px 20px 0px 0px;">
        <a href="index.php">Home</a>&nbsp&nbsp&nbsp
        <a href="about.php">About</a>&nbsp&nbsp&nbsp
        <a href="contact.php">Contact</a>&nbsp&nbsp&nbsp
        <?php 
            $id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
            if($id != '')
            {
                echo "<a href=\"signin.php\">Login</a>";
            }
            else
            {
               echo "<a href=\"createpost.php\">Add Post</a>&nbsp;&nbsp;
                    <a href=\"alluser.php\">All User</a>&nbsp;&nbsp;
                    <a href=\"signin.php\">Logout</a>";
            }
          
        ?>
    </nav>
</header>