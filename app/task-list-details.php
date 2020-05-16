<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        require_once("init.php");

        //hole alle ein task aus der DB als Array mit GET
        $taskLoader = new TaskLoader();
        $onetask = $taskLoader->getOneByID($_GET["id"]);


        print_array($onetask);

    ?>
    
</body>
</html>