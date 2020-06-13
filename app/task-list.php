<?php
    require_once("init.php");
    require("head.php");

    //prüfen ob felder ausgefüllt
    if (isset($_POST['einloggen'])){

        if(empty($_POST['login-username']) || empty($_POST['login-password'])){
            $_SESSION['message'] = '<div class="infobox">Es fehlt ein Wert, versuchs nochmal</div>';
        } else {

            /*
            //prüfen ob user existiert in der db   >>>>>> funktionniert nicht!
            $form = [
                ":username" => $_POST['login-username'],
                ":password" => password_hash($_POST['login-password'], PASSWORD_DEFAULT),
            ];

            try{
                $userLogin = new UserRepository();
                $response = $userLogin->userLogin($form);
                if ($response){
                    echo $response; //was kommt da zurück?
                    $_SESSION['login'] = true;
                    $_SESSION['message'] = '<div class="infobox">du hast dich erfolgreich eingeloggt</div>';
                    //weiterleitung auf eingeloggte seite
                    //redirect('task-list.php');
                } else {

                }
            } catch (Exception $e){
                echo $e->getMessage();
                die();
            }

            */
            
        }
    }

    if (isset($_SESSION['login'])){

//  ------------------- wenn eingeloggt -------------------------

?>

<body>
    <h1>Taskliste</h1>
    <main>

        <!-- buttons -->
        <div class="functions">
            <a href="new-task.php" class="functions__newTask">neuen Task erstellen</a>
            <a href="logout.php" class="functions__newTask">ausloggen</a>
        </div>

        <!--message anzeigen-->
        <?php
            if(isset($_SESSION['message'])){ 
                echo $_SESSION['message']; //wenn message gesetzt, gib sie aus
                unset($_SESSION['message']); //wenn ausgegeben, dann leere die session speicher wieder, damit nicht bei jedem reload die message wieder kommt.
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

<?php

//  ------------------- wenn nicht eingeloggt -------------------------

    }else{
?>

<body>
    <h1>Taskliste</h1>
    <main>
        <h2 class="notLoggedIn">du musst dich zuerst einloggen!</h2>
        <!-- buttons -->
        <div class="functions">
            <a href="new-user.php" class="functions__newTask">neuen User registrieren</a>
        </div>

        <!--message anzeigen-->
        <?php
            if(isset($_SESSION['message'])){ 
                echo $_SESSION['message']; //wenn message gesetzt, gib sie aus
                unset($_SESSION['message']); //wenn ausgegeben, dann leere die session speicher wieder, damit nicht bei jedem reload die message wieder kommt.
            }
        ?>

        <!--loginbereich-->
        <h2 class="tasktitle">Login</h2>

        <div class="login">
            <form method="POST" action="task-list.php">

                <div class="login__username">
                    <label for="login__username">username:</label>
                    <input id="login__username" type="text" name="login-username">
                </div>
                <div class="login__password">
                    <label for="login__password">Passwort:</label>
                    <input id="login__password" type="password" name="login-password">
                </div>

                <input type="submit" class="login__savebutton" value="einloggen" name="einloggen">
                
            </form>
        </div>
    </main>
</body>
</html>

<?php
    }
?>

