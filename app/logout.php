<?php

    require_once("init.php");

    $_SESSION['message'] = '<div class="infobox">Du hast dich erfolgreich ausgeloggt</div>';
    unset($_SESSION['login']); //leere die session speicher wieder
    redirect('task-list.php');

?>