<?php
require("head.php");
?>

<body>
    <?php

    require_once("init.php");

    //hole ein task aus der DB als Array mit GET
    $taskLoader = new TaskLoader();

    $onetask = $taskLoader->getOneByID($_GET["id"]);

    $tasktitle = $onetask['title'];
    $taskduedate = $onetask['duedate'];
    $userID = $onetask['user_id'];
    $taskdescription = $onetask['description'];
    $taskstatus = $onetask['status_id'];
    $taskID = $onetask['id'];
    

    //hole alle user aus der DB als Array
    $taskLoader = new TaskLoader();
    $allUsers = $taskLoader->getUsers();

    //hole alle status aus der DB als Array
    $allStatus = $taskLoader->getStatus();

    ?>

    <h1>Taskliste</h1>
    <main>
        
        <!-- buttons -->
        <div class="functions">
            <a href="task-list.php" class="functions__back">zurück zur Übersicht</a>
        </div>

        <h2 class='tasktitle'>Task bearbeiten</h2>

        <div class="newTask">
            <form method="post" action="edit-task.php">
                <div class="newTask__title">
                    <label for="title">Titel:</label>
                    <input id="title" type="text" name="title" value="<?php echo $tasktitle; ?>">
                </div>
                <div class="newTask__user">
                    <label for="user">Verantwortlich:</label>
                    <select id="user" name="user">

                        <?php

                        foreach($allUsers as $user){
                            if ($userID === $user['id']){
                                echo "<option value='$user[id]' selected='selected'>$user[name] $user[lastname]</option>";
                            } else {
                                echo "<option value='$user[id]'>$user[name] $user[lastname]</option>";
                            }
                        }
                        
                        ?>

                    </select>
                </div>
                <div class="newTask__status">
                    <label for="status">Status:</label>
                    <select id="status" name="status">

                        <?php

                            foreach($allStatus as $status){
                                if ($taskstatus === $status['id']){
                                    echo "<option value='$status[id]' selected='selected'>$status[display_name]</option>";
                                } else {
                                    echo "<option value='$status[id]'>$status[display_name]</option>";
                                }
                            }

                        ?>

                    </select>
                </div>
                <div class="newTask__description">
                    <label for="description">Beschreibung:</label>
                    <textarea id="description" type="text" name="description"><?php echo $taskdescription; ?></textarea>
                </div>
                <div class="newTask__date">
                    <label for="date">Zu erledigen bis:</label>
                    <input id="date" type="date" name="date" value="<?php echo $onetask['duedate']; ?>">
                </div>
                <input type="submit" class="newTask__savebutton" value="speichern" name="save">
            </form>
            
        </div>

        <?php
        //save
        $taskSaver = new TaskSaver();

        if(isset($_POST['save'])){
            $saveTitle = $_POST['title'];
            $saveUser = $_POST['user'];
            $saveStatus = $_POST['status'];
            $saveDescription = $_POST['description'];
            $saveDate = $_POST['date'];
            $saveDuration = 500;
            $taskSaver->updateTask($saveUser, $saveStatus, $saveTitle, $saveDescription, $saveDuration, $saveDate);


            echo "<div class='infobox'>new Task is updated</div>";
        }
        ?>


    </main>
</body>
</html>