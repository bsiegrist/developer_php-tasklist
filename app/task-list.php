<?php

    require_once("init.php");

    $taskLoader = new TaskLoader();

    echo "<h2>Alle ausgeben</h2>";
    print_array($taskLoader->getAll());

?>