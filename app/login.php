<?php
    require_once("init.php");
    require("head.php");


    //prüfen ob felder ausgefüllt
    if (isset($_POST['einloggen'])){
    
        if(empty($_POST['login-username']) || empty($_POST['login-password'])){
            echo "es fehlt ein Wert! Versuchs nochmal.";
        } else {
            //prüfen ob user existiert in der db   >>>>>> funktionniert nicht!
            $form = [
                ":username" => $_POST['login-username'],
                ":password" => password_hash($_POST['login-password'], PASSWORD_DEFAULT),
            ];

            try{
                $userLogin = new UserRepository();
                $response = $userLogin->userLogin($form);
                $_SESSION['login'] = true;
                $_SESSION['message'] = '<div class="infobox">du hast dich erfolgreich eingeloggt</div>';
            } catch (Exception $e){
                echo $e->getMessage();
                die();
            }

            //weiterleitung auf eingeloggte seite
            redirect('task-list.php');
            
        }
    }



?>

<body>
    <h1>Taskliste</h1>
    <main>
        <!-- buttons -->
        <div class="functions">
            <a href="task-list.php" class="functions__back">zurück zur Startseite</a>
            <a href="new-user.php" class="functions__newTask">neuen User registrieren</a>
        </div>


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
