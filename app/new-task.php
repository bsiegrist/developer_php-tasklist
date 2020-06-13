<?php
    require_once("init.php");
    require("head.php");
    require("login-validator.php");
?>

<body>
    <?php
        //hole alle user aus der DB als Array
        $userLoader = new UserRepository();
        $allUsers = $userLoader->getUsers();

        //hole alle status aus der DB als Array
        $statusLoader = new StatusRepository();
        $allStatus = $statusLoader->getStatus();

        //save
        $taskSaver = new TaskRepository();

        if(isset($_POST['save'])){
            $saveTitle = $_POST['title'];
            $saveUser = $_POST['user'];
            $saveStatus = $_POST['status'];
            $saveDescription = $_POST['description'];
            $saveDate = $_POST['date'];
            $saveDuration = 500;

            try{
                $taskSaver->saveTask($saveUser, $saveStatus, $saveTitle, $saveDescription, $saveDuration, $saveDate);
                $_SESSION['message'] = '<div class="infobox">neuer Task mit Titel «'.$saveTitle.'» wurde erstellt</div>';
            } catch (Exception $e){
                echo $e->getMessage();
                die();
            }

            redirect('task-list.php');
        }
    ?>

    <h1>Taskliste</h1>
    <main>
        
        <!-- buttons -->
        <div class="functions">
            <a href="task-list.php" class="functions__back">zurück zur Übersicht</a>
        </div>

        <h2 class='tasktitle'>Neuen Task erstellen</h2>

        <div class="newTask">
            <form method="POST" action="new-task.php">
                <div class="newTask__title">
                    <label for="title">Titel:</label>
                    <input id="title" type="text" name="title">
                </div>
                <div class="newTask__user">
                    <label for="user">Verantwortlich:</label>
                    <select id="user" name="user">

                        <?php
                        foreach($allUsers as $user){
                            echo "<option value='$user[id]'>$user[name] $user[lastname]</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="newTask__status">
                    <label for="status">Status:</label>
                    <select id="status" name="status">

                        <?php
                            foreach($allStatus as $status){
                            echo "<option value='$status[id]'>$status[display_name]</option>";
                            }
                        ?>

                    </select>
                </div>
                <div class="newTask__description">
                    <label for="description">Beschreibung:</label>
                    <textarea id="description" type="text" name="description"></textarea>
                </div>
                <div class="newTask__date">
                    <label for="date">Zu erledigen bis:</label>
                    <input id="date" type="date" name="date">
                </div>
                <input type="submit" class="newTask__savebutton" value="speichern" name="save">
            </form>
            
        </div>



    </main>
</body>
</html>