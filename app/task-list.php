<?php
require("head.php");
?>


<body>
    <h1>Taskliste</h1>
    <main>

        <!-- buttons -->
        <div class="functions">
            <a href="new-task.php" class="functions__newTask">neuen Task erstellen</a>
            <a class="functions__deleteAll">alle Tasks löschen</a>
        </div>

        <div class="tasklist">

            <!-- titelzeile tabelle -->
            <div class='tasklist__taskline tasklist__tabletitleline'>
                <h2 class='tasklist_tabletitle'>Task</h2>
                <h2 class='tasklist_tabletitle'>Duedate</h2>
            </div>
            <hr>

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

