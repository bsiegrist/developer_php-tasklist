<?php
    require_once("init.php");
    require("head.php");
?>

<body>
    <h1>Taskliste</h1>
    <main>

        <!-- buttons -->
        <div class="functions">
            <a href="new-task.php" class="functions__newTask">neuen Task erstellen</a>
            <!--<a class="functions__deleteAll">alle Tasks löschen</a>-->
        </div>

        <!--message anzeigen-->
        <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>

        <div class="tasklist">

            <!-- titelzeile tabelle -->
            <div class="tasklist__taskline tasklist__tabletitleline">
                <h2 class="tasklist_tabletitle">Task</h2>
                <h2 class="tasklist_tabletitle">Duedate</h2>
            </div>
            <hr>

            <!-- liste -->
            <?php
                //hole alle tasks aus der DB als Array
                $taskLoader = new TaskRepository();
                $alltasks = $taskLoader->getAll();

                //alle als zeile ausgeben
                foreach ($alltasks as $task){
                    $tasktitle = $task['title'];
                    $taskduedate = $task['duedate'];
                    $taskid = $task['id'];
                    ?>
                    <div class="tasklist__taskline">
                        <h3 class="tasklist_tasktitle"><?= $tasktitle ?></h3>
                        <p><?= $taskduedate ?></p>
                        <a href="task-list-details.php?id=<?= $taskid ?>" class="tasklist__taskbutton tasklist__details"></a>
                        <a href="edit-task.php?id=<?= $taskid ?>" class="tasklist__taskbutton tasklist__edit"></a>
                        <a onclick="return confirm('wirklich Task mit dem Titel «<?= $tasktitle ?>» löschen?')" href="delete-task.php?id=<?= $taskid ?>" class="tasklist__taskbutton tasklist__delete"></a>
                    </div>
                    <hr>
                    <?php
                }
            ?>
        </div>
    </main>
</body>
</html>

