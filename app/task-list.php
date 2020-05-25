<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasklist Challenge – WebProfessionals</title>

    <link rel="stylesheet" href="dev/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&family=PT+Serif&display=swap" rel="stylesheet">

</head>
<body>
    <main>
        <h1>Taskliste</h1>

        <!-- buttons -->
        <div class="functions">
            <a class="functions__newTask">neuen Task erstellen</a>
            <a class="functions__deleteAll">alle Tasks löschen</a>
        </div>

        <div class="tasklist">

            <!-- titelzeile tabelle -->
            <div class='tasklist__taskline tasklist__tabletitleline'>
                <h2 class='tasklist_tabletitle'>Task</h2>
                <h2 class='tasklist_tabletitle'>Duedate</h2>
                <hr>
            </div>

            <!-- liste -->
            <?php

                require_once("init.php");

                //hole alle tasks aus der DB als Array
                $taskLoader = new TaskLoader();
                $alltasks = $taskLoader->getAll();

                //alle als zeile ausgeben
                foreach ($alltasks as $task){
                    $tasktitle = $task['title'];
                    $taskduedate = $task['duedate'];
                    $taskid = $task['id'];
                    echo "<div class='tasklist__taskline'><h3 class='tasklist_tasktitle'>$tasktitle</h3><p>$taskduedate</p><a href='task-list-details.php?id=$taskid' class='tasklist__taskbutton tasklist__details'></a><a class='tasklist__taskbutton tasklist__edit'></a><a class='tasklist__taskbutton tasklist__delete'></a></div><hr>";
                }

                
            ?>
        </div>
    </main>
</body>
</html>

