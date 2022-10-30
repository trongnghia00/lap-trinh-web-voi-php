<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Session page 1</title>
    </head>
    <body>
        <h1>Session page 1</h1>
        
        <?php
        $_SESSION["favcolor"] = "red";
        ?>

    </body>
</html>