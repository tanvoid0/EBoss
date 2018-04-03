
<?php
    include_once 'database/server.php';
    if(empty($_SESSION["user_id"])) {
        include 'pages/login.php';
    }
    else{
      include 'pages/dashboard.php';
    }
?>
