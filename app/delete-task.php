<?php
    //init
    require_once("init.php");

    //taskloader holen
    //task id auslesen
    //funktion delete
    $taskLoader = new TaskLoader();
    try{
        $onetask = $taskLoader->deleteTask($_GET["id"]);
        $_SESSION['message'] = "Der Task mit der id {$_GET["id"]} wurde gelöscht";
    } catch (Exception $e){
        echo $e->getMessage();
        die();
    }
    //redirect
    redirect('task-list.php');

?>