<header style="background-color: deepskyblue">
    <div style="display: inline-block">
        <img src="Assets/Images/logo.png" alt="Logo" height="70px" width="75px">
    </div>
    <h1 style="display: inline-block; color: darkblue; padding-left: 1%;">SmartBlogER</h1>
    
    <nav class = "menu" style="float: right; margin: 25px 20px 0px 0px;">
        <a href="index.php">HOME</a>&nbsp;&nbsp;&nbsp;
        <a href="about.php">ABOUT</a>&nbsp;&nbsp;&nbsp;
        <a href="contact.php">CONTACT</a>&nbsp;&nbsp;&nbsp;
        <?php 
            session_start();
            if(!isset($_SESSION['cid']))
            {
                echo "<a href=\"signin.php\">LOGIN</a>";
            }
            else
            {
                echo "<a href=\"viewprofile.php\">".strtoupper($_SESSION['cname'])."</a>&nbsp;&nbsp;&nbsp;";
                if($_SESSION['crole'] == 'author' OR $_SESSION['crole'] == 'admin')
                {
                    echo "<a href=\"createpost.php\">ADD POST</a>&nbsp;&nbsp;&nbsp;";
                    if( $_SESSION['crole'] == 'admin')
                    {
                        echo "<a href=\"createcatagery.php\">ADD CATAGERY</a>&nbsp;&nbsp;&nbsp;
                        		<a href=\"alluser.php\">ALL USER</a>&nbsp;&nbsp;&nbsp;";
                    }
                }   
                echo "<a href=\"logout.php\">LOGOUT</a>";
            }
        ?>
    </nav>
</header>