<?php 
require 'Assets\common pages\head.php';

require 'Assets\common pages\mainheader.php';

for ($i=0; $i < 10; $i++) { 
    include 'body.php';
}

require 'Assets\common pages\footer.php';
?>