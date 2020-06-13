<?php
    require_once("init.php");
    require("head.php");

    //wenn formular ausgefüllt
    if (isset($_POST['einloggen'])){
        //prüfen ob felder ausgefüllt
        if(empty($_POST['login-username']) || empty($_POST['login-password'])){
            $_SESSION['message'] = '<div class="infobox">Es fehlt ein Wert, versuchs nochmal</div>';
        } else {
            //hole einen User aus der DB als Array mit POST
            $userLoader = new UserRepository();
            $oneUser = $userLoader->getOneUser($_POST["login-username"]);

            if ($oneUser === null){
                $_SESSION['message'] = '<div class="infobox">Dieser User existiert nicht. Versuchs nochmal</div>';
                redirect("task-list.php");
            } else{
                $password = password_hash($oneUser['password'], PASSWORD_DEFAULT);
                $userID = $oneUser['id'];
                $username = $oneUser['username'];
                
                //prüfen ob übereinstimmt mit db
                if ($password === $_POST["login-password"]){
                    $_SESSION['message'] = '<div class="infobox"erfolgreich eingeloggt!</div>';
                    $_SESSION['userID'] = $userID;
                    redirect("task-list.php");
                } else{
                    $_SESSION['message'] = '<div class="infobox">Das Passwort stimmt nicht. Versuchs nochmal</div>';
                    redirect("task-list.php");
                }
            }


        }
    }
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
            <form method="POST" action="login.php">

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