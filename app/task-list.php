<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasklist Challenge – WebProfessionals</title>

    <link rel="stylesheet" href="dev/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=PT+Serif&display=swap" rel="stylesheet">

</head>
<body>
    <main>
        <h1>Taskliste</h1>

        <div class="tasklist">
            <?php

                require_once("init.php");

                //hole alle tasks aus der DB als Array
                $taskLoader = new TaskLoader();
                $alltasks = $taskLoader->getAll();

                foreach ($alltasks as $task){
                    $tasktitle = $task['title'];
                    $taskduedate = $task['duedate'];
                    $taskid = $task['id'];
                    echo "<div class='tasklist__taskline'><h3 class='tasklist_tasktitle'>$tasktitle</h3><p>$taskduedate</p><a href='task-list-details.php?id=$taskid'class='tasklist_taskdetails'><button>Details</button></a><button class='tasklist_edit'>Bearbeiten</button><button class='tasklist_delete'>Löschen</button></div>";
                }

                
            ?>
        </div>
    </main>
</body>
</html>

