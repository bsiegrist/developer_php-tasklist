<?php
    require_once("init.php");
    require("head.php");
?>

<body>
    <?php

    //hole ein task aus der DB als Array mit GET
    $taskLoader = new TaskLoader();
    $onetask = $taskLoader->getOneByID($_GET["id"]);

    $tasktitle = $onetask['title'];
    $taskduedate = $onetask['duedate'];
    $userID = $onetask['user_id'];
    $taskdescription = $onetask['description'];
    $taskstatus = $onetask['status_id'];
    $taskID = $onetask['id'];

    ?>

    <h1>Taskliste</h1>
    
    <main>

        <!-- buttons -->
        <div class="functions">
            <a href="task-list.php" class="functions__back">zurück zur Übersicht</a>
        </div>

        <?php
            echo "<h2 class='tasktitle'>$tasktitle</h2>";
        ?>

        <div class="detail">
            <?php
                echo "<p class='detail__description'>$taskdescription</p>";
                echo "<h3>ID:</h3><p>$taskID</p>";
                echo "<h3>Status:</h3> <p>$taskstatus</p>";
                echo "<h3>Zu erledigen bis:</h3> <p>$taskduedate</p>";
                echo "<h3>Verantwortlich:</h3> <p>$userID</p>";
            ?>
        </div>


    </main>
</body>
</html>