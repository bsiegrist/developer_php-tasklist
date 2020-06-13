<?php

    require_once("init.php");
        
    if (!isset($_SESSION['userID'])){
        redirect("login.php");
    }

?>