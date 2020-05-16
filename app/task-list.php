<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasklist Challenge – WebProfessionals</title>
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
                    echo "<div class='tasklist__taskline'><h3 class='tasklist_tasktitle'>$tasktitle</h3><p>$taskduedate</p><button class='tasklist_taskdetails'>Details</button><button class='tasklist_edit'>Bearbeiten</button><button class='tasklist_delete'>Löschen</button></div>";
                }

                
            ?>
        </div>
    </main>
</body>
</html>

