<?php
    require_once("init.php");
    require("head.php");

    //wenn formular ausgefüllt
    if (isset($_POST['einloggen'])){
        //prüfen ob felder ausgefüllt
        if(empty($_POST['login-username']) || empty($_POST['login-password'])){
            $_SESSION['message'] = '<div class="infobox">Es fehlt ein Wert, versuchs nochmal</div>';
        } else {
            //prüfen ob übereinstimmt mit db
            try{
                $statement = DB::get()->prepare("SELECT id, password FROM user WHERE username = :username LIMIT 1");
                $userdata = [
                    ":username" => $_POST['login-username'],
                ];
                $singleUser = $statement->execute($userdata);
                print_array($singleUser);

                /*
                if ($User && password_verify(password_hash($_POST['password'], PASSWORD_DEFAULT), $User['password'])){
                    $_SESSION['userID'] = $;
                    redirect('task-list.php');
                }
                */


            } catch (Exception $e){
                echo $e->getMessage();
                die();
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