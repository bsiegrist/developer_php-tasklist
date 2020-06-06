<?php
    //init
    require_once("init.php");

    //taskloader holen
    //task id auslesen
    //funktion delete
    $taskLoader = new TaskLoader();

    //hole ein task aus der DB als Array mit GET für Titel
    $onetask = $taskLoader->getOneByID($_GET["id"]);
    $tasktitle = $onetask['title'];


    try{
        $taskLoader->deleteTask($_GET["id"]);
        $_SESSION['message'] = '<div class="infobox">Der Task mit dem Titel «'.$tasktitle.'» wurde gelöscht</div>';
    } catch (Exception $e){
        echo $e->getMessage();
        die();
    }
    //redirect
    redirect('task-list.php');

?>