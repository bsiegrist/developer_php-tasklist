<?php
require("head.php");
?>

<body>
    <?php

    require_once("init.php");

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

        <h2 class='tasktitle'>Neuen Task erstellen</h2>

        <div class="newTask">
            <form>
                <div class="newTask__user">
                    <label for="user">Verantwortlich:</label>
                    <select id="user">

                        <?php

                        foreach($allUsers as $user){
                            echo "<option value='$user[lastname]'>$user[name] $user[lastname]</option>";
                        }
                        
                        ?>

                    </select>
                </div>
                <div class="newTask__status">
                    <label for="status">Status:</label>
                    <select id="status">

                        <?php

                            foreach($allStatus as $status){
                            echo "<option value='$status[name]'>$status[display_name]</option>";
                            }

                        ?>

                    </select>
                </div>
                <div class="newTask__title">
                    <label for="title">Titel:</label>
                    <input id="title" type="text" name="title">
                </div>
                <div class="newTask__description">
                    <label for="description">Beschreibung:</label>
                    <textarea id="description" type="text" name="description"></textarea>
                </div>
                <div class="newTask__date">
                    <label for="date">Zu erledigen bis:</label>
                    <input id="date" type="date" name="date">
                </div>
                <button class="newTask__savebutton">speichern</button>
            </form>
            
        </div>



    </main>
</body>
</html>