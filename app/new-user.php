<?php
    require_once("init.php");
    require("head.php");


    //validierung
    if (isset($_POST['submit'])){

        if (empty($_POST['username']) || empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['password']) || empty($_POST['password-repeat'])){  //checked ob alle felder ausgefüllt sind
            echo "es fehlt ein Wert! Versuchs nochmal.";
        } elseif ($_POST['password'] != $_POST['password-repeat']){ //checked ob password-repeat stimmt
            echo "Passwörter stimmen nicht überein. Versuchs nochmal.";
        } else { //kommt hier hin, wenn alles stimmt
            //hole alle infos aus formular als array fürs statement
            $form = [
                ":username" => $_POST['username'],
                ":lastname" => $_POST['lastname'],
                ":name" => $_POST['name'],
                ":password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            try{
                $userLoader = new UserRepository();
                $allUsers = $userLoader->createUser($form);
                $_SESSION['message'] = '<div class="infobox">neuer user «'.$_POST['username'].'» wurde registriert</div>';
            } catch (Exception $e){
                echo $e->getMessage();
                die();
            }

            redirect('task-list.php');
        };
    };


?>

<body>
    <h1>Taskliste</h1>
    <main>
        <h2>Als neuer User registrieren</h2>
        <form method="POST" action="new-user.php">
            <label>Vorname:
                <input type="text" name="name" maxlength="20">
            </label>   
            <label>Nachname:
                <input type="text" name="lastname" maxlength="20">
            </label>   
            <label>User-Name:
                <input type="text" name="username" maxlength="20">
            </label>   
            <label>Passwort:
                <input type="password" name="password">
            </label> 
            <label>Passwort wiederholen:
                <input type="password" name="password-repeat">
            </label>    
            <input type="submit" value="registrieren" name="submit">
        </form>